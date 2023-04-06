# Crop and Upload to File and DB

Edit the `db.php` file to match your local configuration.

Ensure you run this command to create the table in your database.

``` SQL
CREATE TABLE crop_images (
  id INT(11) NOT NULL AUTO_INCREMENT,
  title BLOB NOT NULL,
  PRIMARY KEY (id)
);
```

Easy.
