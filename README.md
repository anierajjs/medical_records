# medical_records

> This repository contains a system for managing medical records. It provides different access levels for medical record analysts and managers to view and update medical records.

# User Roles
* Medical Record Analyst
* Manager

# Features
1. Logout: This feature allows the user to log out of the system and end the current session.
2. Welcome, Medical Record Analyst/Manager!: Upon logging into the system, a welcome message is displayed based on the user's role.
3. All Records: This feature displays all existing medical records in a tabular format. Each record includes the record ID, client number, department number, allocation date, last update date, medical history, risk factor, and an option to update the record (available for medical record analysts only).
4. Medical record analysts can read and update all the records.
5. Managers can read but not update client records for their department

# Usage
- Medical Record Analyst Access: (medical record analysts have READ/WRITE access)

  > 1.	Login: Use the provided medical record analyst login credentials to access your account. Enter your username and password in the respective fields.
  > 2.	All Records: Once logged in as a medical record analyst, you will be greeted with a welcome message. Navigate to the "All Records" section to view all medical records.
  >     The table displays the
  >   	- record ID,
  >     - client number,
  >     - department number,
  >     - allocation date,
  >     - last update date,
  >     - medical history,
  >     - risk factor,
  >     - and an option to update each record.
  > 4.	Update Record: If you need to update a medical record, select the "Update" option next to the desired record. Enter the updated information in the corresponding fields and submit the changes.
  > 5.	Logout: To end your session, select the "Logout" option.

- Manager Access: (managers have READ access)

  > 1.	Login: Use the provided manager login credentials to access your account. Enter your username and password in the respective fields.
  > 2.	All Records: Once logged in as a manager, you will be greeted with a welcome message. Navigate to the "All Records" section to view all medical records.
        The table displays the
  >   	- record ID,
  >     - client number,
  >     - department number,
  >     - allocation date,
  >     - last update date,
  >     - and risk factor.
  > 4.	Logout: To end your session, select the "Logout" option.

# Login Credentials
- Medical Record Analyst:
  > Username: analyst ;
  > Password: password

- Manager:
  > Username: manager ;
  > Password: password

Please note that these login credentials are provided as examples and may not represent real accounts. The system already contains pre-existing medical records for demonstration purposes.

# Disclaimer
This system is a demonstration and should not be used in a production environment. It is recommended to enhance security measures, such as implementing proper user authentication and data validation, before deploying it for real-world usage. For any issues or questions regarding the system, please contact the system administrator or the developer.
