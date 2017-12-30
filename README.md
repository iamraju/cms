# CMS - Content Management System

Swastik College - BSC CSIT, 6th Semester Workshop on Content Management System using PHP &amp; MySQL.

#### Subject : Webtech
#### Workshop - On CMS & Simple Informative Website
#### Date : 31st December, 2017
#### Time: 7:00 AM - 10:30 AM

## Purpose
To demonstrate and practise the client and server side web development knowledge learnt in the class.

## Requirements/Features

### Admin/Backend
#### Login
- Forgot password
- Login to admin 

### User Management
- Add/edit/delete/suspend admin user
- Change password
- Edit own profile (name, photo)

### Page Management
- Add, Edit and Delete Contents (Pages)

### Blog Management
- Manage (add/edit/delete) Categories
- Manage blog posts

### Photo Gallery
- Add/edit/delete albums
- Add/delete photos to/from albums

### Settings/Configuration (
- A configuration/settings section for managing (add/edit/delete) application wise configurable values

## Frontend Website
- Homepage
- About Us
- Photo Gallery (Albums and Photos)
- Contact Us Form
- Send email to admin upon submission

## Database :
### roles
```sql
create table roles (
	id int(11) not null auto_increment primary key,
	name varchar(200) not null,
	status smallint(4) not null default '1'
);
```
### users
```sql
create table users (
	id int(11) not null auto_increment primary key,
	first_name varchar(200) not null,
	last_name varchar(200) not null,
	email varchar(200) not null,
	username varchar(200) not null,
	password varchar(200) not null,
	status smallint(4) not null default '1',
	last_login_at datetime,
	role_id int(11) null,
	FOREIGN KEY fk_users_role(role_id) REFERENCES roles(id)
);
```

### pages
```sql
create table pages (
	id int(11) not null auto_increment primary key,
	title varchar(200) not null,
	slug varchar(200) not null,
	details text null,
	status smallint(4) not null default '1',
	created_at datetime,
	updated_at datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	user_id int(11) null,
	unique(slug),
	FOREIGN KEY fk_pages_user(user_id) REFERENCES users(id)
);
```

### albums
```sql
create table albums (
	id int(11) not null auto_increment primary key,
	name varchar(200) not null,
	details text null,
	status smallint(4) not null default '1'
);
```

### photos
```sql
create table photos (
	id int(11) not null auto_increment primary key,
	album_id int(11) null,
	filename varchar(200) not null,
	is_cover_photo smallint(4) not null default '0',
	FOREIGN KEY fk_photos_album(album_id) REFERENCES albums(id)
);
```

### categories
```sql
create table categories (
	id int(11) not null auto_increment primary key,
	name varchar(200) not null,
	details text null,
	status smallint(4) not null default '1'
);
```

### posts
```sql
create table posts (
	id int(11) not null auto_increment primary key,
	category_id int(11) null,
	title varchar(200) not null,
	slug varchar(200) not null,
	details text null,
	status smallint(4) not null default '1',
	created_at datetime,
	updated_at datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	user_id int(11) null,
	unique(slug),
	FOREIGN KEY fk_posts_category(category_id) REFERENCES categories(id),
	FOREIGN KEY fk_posts_user(user_id) REFERENCES users(id)
);
```

### configurations
```sql
create table configurations (
	id int(11) not null auto_increment primary key,
	category varchar(100) null default 'general',
	caption varchar(200) not null,
	path varchar(200) not null,
	value text null,
	remarks text null,
	updated_at datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	unique(path)
);
```
