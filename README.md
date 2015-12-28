# 123 child theme
This theme has been written to have our custom onboarding form.

##Installation instructions
- intall the theme normally as any other theme
- connect to the db and run this query
```
CREATE TABLE IF NOT EXISTS wp_demands (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
city VARCHAR(50),
service_category_id VARCHAR(50),
service_id VARCHAR(50),
vin_number VARCHAR(20),
brand VARCHAR(20),
model VARCHAR(20),
year VARCHAR(20),
engine VARCHAR(20),
engine_letters VARCHAR(20),
name_and_surnames VARCHAR(100),
phone VARCHAR(20),
email VARCHAR(20),
wants_newsletter BOOLEAN,
accepts_privacy BOOLEAN,
comments TEXT,
demand_details TEXT
);
```