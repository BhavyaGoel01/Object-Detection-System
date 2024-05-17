-- Create the user table
CREATE TABLE user (
    user_id VARCHAR(255) PRIMARY KEY,
    user_name VARCHAR(255),
    user_email VARCHAR(255),
    user_password VARCHAR(255)
);

-- Create the image table with a foreign key reference to user_id
CREATE TABLE image (
    user_id VARCHAR(255) PRIMARY KEY,
    img VARCHAR(255),
    FOREIGN KEY (user_id) REFERENCES user(user_id)
);
