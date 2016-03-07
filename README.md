# 123 child theme
This theme has been written to have our custom onboarding form.

##Installation instructions
- intall the theme normally as any other theme
- connect to the db and run these queries
```
CREATE TABLE IF NOT EXISTS wp_demands (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
city VARCHAR(50),
service_category_id VARCHAR(50),
service_id VARCHAR(50),
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

```