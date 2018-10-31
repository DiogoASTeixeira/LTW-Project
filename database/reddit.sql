DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS posts;
DROP TABLE IF EXISTS comments;

CREATE TABLE users
(
  username VARCHAR PRIMARY KEY,
  password VARCHAR,
  email VARCHAR
);

CREATE TABLE posts
(
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  author VARCHAR,
  date DATE NOT NULL,
  title VARCHAR,
  textbody TEXT,
  upvotes INTEGER,
  FOREIGN KEY (author) REFERENCES users(username)
);

CREATE TABLE comments
(
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  idPost INTEGER,
  date DATE NOT NULL,
  textbody TEXT,
  upvotes INTEGER,
  FOREIGN KEY (idPost) REFERENCES posts(id)
);


INSERT INTO users VALUES ("admin",  "admin", "admin@admin.com");