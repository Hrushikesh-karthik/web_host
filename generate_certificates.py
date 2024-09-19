import sys
import pandas as pd
from docx import Document
from docx2pdf import convert
from email.mime.multipart import MIMEMultipart
from email.mime.application import MIMEApplication
from email.mime.text import MIMEText
from smtplib import SMTP
from docx.shared import Pt  # For font size
import os

def set_font(run, bold=False):
    """
    Helper function to set the text to bold for the name only.
    We are not setting the font size or font name to avoid overriding original formatting.
    """
    if bold:
        run.bold = True

def process_files(excel_path, word_template_path):
    try:
        # Define paths for saved certificates
        upload_dir = 'uploads/'
        if not os.path.exists(upload_dir):
            os.makedirs(upload_dir)

        # Load Excel data
        df = pd.read_excel(excel_path, engine='openpyxl')

        # Set up email configuration
        smtp_server = 'smtp.gmail.com'
        smtp_port = 587
        smtp_user = 'karthiku1904@gmail.com'
        smtp_password = 'orvg lawx wwhz ccyn'

        # Create SMTP session
        smtp = SMTP(smtp_server, smtp_port)
        smtp.starttls()
        smtp.login(smtp_user, smtp_password)

        for _, row in df.iterrows():
            name = str(row['name'])
            email = str(row['email'])
            roll_no = str(row['roll_no'])  # Ensure roll_no is a string
            department = str(row['department'])

            # Load the Word template
            doc = Document(word_template_path)
            
            # Replace placeholders without changing the rest of the formatting
            for paragraph in doc.paragraphs:
                for run in paragraph.runs:
                    if '{name}' in run.text:
                        run.text = run.text.replace('{name}', name)
                        set_font(run, bold=True)  # Make the name bold but don't change font size
                    if '{roll_no}' in run.text:
                        run.text = run.text.replace('{roll_no}', roll_no)  # Leave original size and style
                    if '{department}' in run.text:
                        run.text = run.text.replace('{department}', department)  # Leave original size and style

            # Save the document to a temporary file
            temp_docx_path = os.path.join(upload_dir, f"temp_{roll_no}.docx")
            doc.save(temp_docx_path)

            # Convert to PDF
            temp_pdf_path = os.path.join(upload_dir, f"temp_{roll_no}.pdf")
            convert(temp_docx_path, temp_pdf_path)

            # Create email message
            message = MIMEMultipart()
            message['From'] = smtp_user
            message['To'] = email
            message['Subject'] = 'Your Participation Certificate'

            body = f"Dear {name},\n\nPlease find attached your participation certificate."
            message.attach(MIMEText(body, 'plain'))

            # Attach PDF
            with open(temp_pdf_path, 'rb') as f:
                attachment = MIMEApplication(f.read(), _subtype='pdf')
                attachment.add_header('Content-Disposition', 'attachment', filename=f'{roll_no}.pdf')
                message.attach(attachment)

            # Send email
            smtp.send_message(message)
            print(f"Certificate sent to {email}.")

            # Clean up temporary files
            os.remove(temp_docx_path)
            os.remove(temp_pdf_path)

        smtp.quit()
        print("All certificates sent successfully.")

    except Exception as e:
        print(f"An error occurred: {e}")

if __name__ == "__main__":
    if len(sys.argv) != 3:
        print("Usage: python generate_certificates.py <excel_path> <word_template_path>")
        sys.exit(1)
    process_files(sys.argv[1], sys.argv[2])
