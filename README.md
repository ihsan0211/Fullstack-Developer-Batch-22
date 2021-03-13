# Fullstack-Developer-Batch-22
### link untuk nomor 1 sampai 3
[Nomor 1](https://jsfiddle.net/ihsan0211/retb79hj/)
[Nomor 2](https://jsfiddle.net/ihsan0211/6mfbxzha/)
[Nomor 3](https://jsfiddle.net/ihsan0211/euhv6m4L)
### Aplikasi sederhana
Untuk membuka aplikasi: \
--- nyalakan xampp, start apache dan mysql \
--- copy file dumbcourse ke htdocs \
--- buka link ```http://localhost/dumbcourse/index.php``` di browser\
\
\
### 4a
##### buat-database
```
CREATE DATABASE dumbcourse;
```
![alt text](https://github.com/ihsan0211/Fullstack-Developer-Batch-22/blob/main/4a/buat-database.png)

##### buat-table
```
USE dumbcourse;
CREATE TABLE author (
id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(64) NOT NULL
);

CREATE TABLE course (
id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(64) NOT NULL,
thumbnail VARCHAR(64) NOT NULL,
id_author INT NULL,
duration VARCHAR(64) NOT NULL,
description VARCHAR(255) NOT NULL,
FOREIGN KEY (id_author) REFERENCES author(id)
ON DELETE SET NULL
ON UPDATE CASCADE
);


CREATE TABLE content (
id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(64) NOT NULL,
video_link VARCHAR(64) NOT NULL,
type VARCHAR(64) NOT NULL,
id_course INT NULL,
FOREIGN KEY (id_course) REFERENCES course(id)
ON DELETE CASCADE
ON UPDATE CASCADE
);
```
![alt text](https://github.com/ihsan0211/Fullstack-Developer-Batch-22/blob/main/4a/buat-table.png)



##### post tambah
![alt text](https://github.com/ihsan0211/Fullstack-Developer-Batch-22/blob/main/4a/post-tambah.png)
```
INSERT INTO author (name) 
VALUES ('ihsan'),
('amal'),
('muhamad');

INSERT INTO course (name, thumbnail, id_author, duration, description)
VALUES ('Javascript', 'javascript.png', 1, '3 jam', 'Javascript advanced'),
('PHP', 'php.png', 2, '3 jam', 'PHP advanced'),
('HTML', 'html.png', 3, '4 jam', 'HTML advanced');

INSERT INTO content (name, video_link, type, id_course)
VALUES ('Introduction', 'https://www.youtube.com/watch?v=T_0CHw6gwRc', 'Beginner', 1),
('Introduction', 'https://www.youtube.com/watch?v=T_0CHw6gwRc', 'Beginner', 2),
('Introduction', 'https://www.youtube.com/watch?v=T_0CHw6gwRc', 'Beginner', 3); 
```



### 4b
##### Halaman utama
![alt text](https://github.com/ihsan0211/Fullstack-Developer-Batch-22/blob/main/4b/index.png)

##### detail
![alt text](https://github.com/ihsan0211/Fullstack-Developer-Batch-22/blob/main/4b/details-course.png)

##### tambah-course
![alt text](https://github.com/ihsan0211/Fullstack-Developer-Batch-22/blob/main/4b/add-course.png)

##### edit course
![alt text](https://github.com/ihsan0211/Fullstack-Developer-Batch-22/blob/main/4b/edit-course.png)

##### tambah content
![alt text](https://github.com/ihsan0211/Fullstack-Developer-Batch-22/blob/main/4b/add-content.png)

##### tambah author
![alt text](https://github.com/ihsan0211/Fullstack-Developer-Batch-22/blob/main/4b/add-author.png)
