CREATE TABLE User_Account (
    user_id VARCHAR(100) PRIMARY KEY,
    email VARCHAR(100) UNIQUE,
    username VARCHAR(100) UNIQUE,
    password VARCHAR(100),
    user_type ENUM('Admin', 'Instructor', 'Student', 'Guest'),
    status ENUM('Active', 'Offline'),
    profile VARCHAR(100)
);

CREATE TABLE Users_Info (
    user_info_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id VARCHAR(100),
    name VARCHAR(100),
    sex ENUM('Male', 'Female', 'Other'),
    complete_address TEXT,
    cellphone VARCHAR(20),
    FOREIGN KEY (user_id) REFERENCES User_Account(user_id)
);


CREATE TABLE Students_Individual_Inventory (
    sii_id INT PRIMARY KEY AUTO_INCREMENT,    
    user_id VARCHAR(100),
    lrn_no VARCHAR(100),
    date_filled DATE,
    age INT,
    date_of_birth DATE,
    nickname VARCHAR(50),
    order_of_birth INT,
    languages_spoken_at_home TEXT,
    languages_most_fluent_in TEXT,
    religion_from_birth VARCHAR(50),
    current_religion VARCHAR(50),
    personal_description TEXT,
    favorite_subjects TEXT,
    most_difficult_subject VARCHAR(50),

    inclination_performance_arts BOOLEAN DEFAULT FALSE,
    inclination_sports BOOLEAN DEFAULT FALSE, 
    inclination_class_leadership BOOLEAN DEFAULT FALSE,
    inclination_others VARCHAR(100), 

    interest_religious_groupings BOOLEAN DEFAULT FALSE,
    interest_creative_arts BOOLEAN DEFAULT FALSE,
    interest_declaration_oration BOOLEAN DEFAULT FALSE,
    interest_acting BOOLEAN DEFAULT FALSE,
    interest_singing BOOLEAN DEFAULT FALSE,
    interest_others VARCHAR(100),

    wants_to_be_teacher BOOLEAN DEFAULT FALSE,
    wants_to_be_doctor_nurse BOOLEAN DEFAULT FALSE,
    wants_to_be_lawyer BOOLEAN DEFAULT FALSE,
    wants_to_be_artist BOOLEAN DEFAULT FALSE,
    wants_to_be_military_police BOOLEAN DEFAULT FALSE,
    wants_to_be_others VARCHAR(100),

    FOREIGN KEY (user_id) REFERENCES User_Account(user_id)
);


CREATE TABLE Family_Data (
    family_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id VARCHAR(100),

    -- Father's Information
    father_name VARCHAR(100),
    father_date_of_birth DATE,
    father_place_of_birth VARCHAR(100),
    father_address TEXT,
    father_cellphone VARCHAR(20),
    father_educational_attainment VARCHAR(100),
    father_occupation VARCHAR(100),
    father_business_address TEXT,
    father_annual_income DECIMAL(10, 2),
    father_languages_spoken TEXT,
    father_religion VARCHAR(50),
    father_deceased BOOLEAN DEFAULT FALSE,

    -- Mother's Information
    mother_name VARCHAR(100),
    mother_date_of_birth DATE,
    mother_place_of_birth VARCHAR(100),
    mother_address TEXT,
    mother_cellphone VARCHAR(20),
    mother_educational_attainment VARCHAR(100),
    mother_occupation VARCHAR(100),
    mother_business_address TEXT,
    mother_annual_income DECIMAL(10, 2),
    mother_languages_spoken TEXT,
    mother_religion VARCHAR(50),
    mother_deceased BOOLEAN DEFAULT FALSE,

    -- Foreign key to link with Students_Individual_Inventory
    FOREIGN KEY (user_id) REFERENCES User_Account(user_id)
);


CREATE TABLE Siblings (
    sibling_id INT PRIMARY KEY AUTO_INCREMENT,
    sii_id INT,
    sibling_name VARCHAR(100),
    school_work_place VARCHAR(100),
    birthday DATE,
    age INT,
    FOREIGN KEY (sii_id) REFERENCES Students_Individual_Inventory(sii_id)
);

CREATE TABLE Parents_Status (
    status_id INT PRIMARY KEY AUTO_INCREMENT,
    sii_id INT,
    living_together BOOLEAN DEFAULT FALSE,
    temporarily_separated BOOLEAN DEFAULT FALSE,
    permanently_separated BOOLEAN DEFAULT FALSE,
    father_ofw BOOLEAN DEFAULT FALSE,
    mother_ofw BOOLEAN DEFAULT FALSE,
    marriage_annulled BOOLEAN DEFAULT FALSE,
    father_with_partner BOOLEAN DEFAULT FALSE,
    mother_with_partner BOOLEAN DEFAULT FALSE,
    FOREIGN KEY (sii_id) REFERENCES Students_Individual_Inventory(sii_id)
);

CREATE TABLE Guardian_Info (
    guardian_id INT PRIMARY KEY AUTO_INCREMENT,
    sii_id INT,
    name VARCHAR(100),
    address TEXT,
    cellphone VARCHAR(20),
    relationship VARCHAR(50),
    FOREIGN KEY (sii_id) REFERENCES Students_Individual_Inventory(sii_id)
);

CREATE TABLE Emergency_Contact (
    emergency_contact_id INT PRIMARY KEY AUTO_INCREMENT,
    sii_id INT,
    contact_name VARCHAR(100),
    age INT,
    occupation VARCHAR(100),
    contact_number VARCHAR(20),
    address TEXT,
    FOREIGN KEY (sii_id) REFERENCES Students_Individual_Inventory(sii_id)
);

CREATE TABLE Educational_Background (
    education_id INT PRIMARY KEY AUTO_INCREMENT,
    sii_id INT,
    elementary_school_name VARCHAR(100),
    elementary_year_completed INT,
    elementary_honors VARCHAR(100),
    secondary_school_name VARCHAR(100),
    secondary_year_completed INT,
    secondary_honors VARCHAR(100),
    FOREIGN KEY (sii_id) REFERENCES Students_Individual_Inventory(sii_id)
);


CREATE TABLE Health_Info (
    health_id INT PRIMARY KEY AUTO_INCREMENT,
    sii_id INT,
    height DECIMAL(5, 2),
    weight DECIMAL(5, 2),
    blood_type VARCHAR(3),
    ailments_handicap BOOLEAN DEFAULT FALSE,
    under_medication BOOLEAN DEFAULT FALSE,
    suicidal_attempt_details TEXT,
    abuse_details TEXT,
    drug_details TEXT,
    mentally_challenged_relative BOOLEAN DEFAULT FALSE,
    relative_relationship TEXT,
    psychiatrist_visit_reason TEXT,
    FOREIGN KEY (sii_id) REFERENCES Students_Individual_Inventory(sii_id)
);

   