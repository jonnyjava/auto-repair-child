# 123 child theme
This theme has been written to have our custom onboarding form.

##Installation instructions
- intall the theme normally as any other theme
- connect to the db and run these queries
```
CREATE TABLE IF NOT EXISTS wp_demands (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
city VARCHAR(50),
service_category_id INT(6) UNSIGNED,
service_category_name VARCHAR(50),
service_id INT(6) UNSIGNED,
service_name VARCHAR(50),
vin_number VARCHAR(17),
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

CREATE TABLE IF NOT EXISTS wp_vin_lookup (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  vin VARCHAR(17) NOT NULL UNIQUE,
  search_flag INT(6) UNSIGNED,
  car_details VARCHAR(200),
  raw_info TEXT
);

CREATE TABLE IF NOT EXISTS wp_proxies (
  ip VARCHAR(25) NOT NULL UNIQUE PRIMARY KEY,
  times_down int(6) UNSIGNED DEFAULT 0
);

CREATE TABLE IF NOT EXISTS wp_bouncing_feedback (
  reason VARCHAR(80),
  comments TEXT,
  token VARCHAR(40)
);

CREATE TABLE IF NOT EXISTS wp_personal_config(
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  ewok_url VARCHAR(60),
  ewok_token VARCHAR(60),
  rollbar_server_token VARCHAR(60),
  rollbar_client_token VARCHAR(60),
  sendinblue_token VARCHAR(60),
  environment VARCHAR(20)
);
INSERT INTO wp_personal_config (ewok_url, ewok_token, rollbar_server_token, rollbar_client_token, sendinblue_token, environment) VALUES('','','','','','development');

```