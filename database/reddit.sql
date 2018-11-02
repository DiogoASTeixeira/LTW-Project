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
  upvotes INTEGER NOT NULL,
  FOREIGN KEY (author) REFERENCES users(username)
);

CREATE TABLE comments
(
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  idPost INTEGER NOT NULL,
  date DATE NOT NULL,
  textbody TEXT,
  upvotes INTEGER NOT NULL,
  FOREIGN KEY (idPost) REFERENCES posts(id)
);


INSERT INTO users VALUES ("admin",  "admin", "admin@admin.com");

INSERT INTO posts VALUES (1, "asd", 1541156269, "Example", "This is an example", 5);
INSERT INTO posts VALUES (2, "asd", 1541156269, "Example", "This is an example", 5);
INSERT INTO posts VALUES (3, "asd", 1541156269, "Example", "This is an example", 5);
INSERT INTO posts VALUES (4, "asd", 1541156269, "Example", "This is an example", 5);
INSERT INTO posts VALUES (5, "asd", 1541156269, "Example", "This is an example", 5);
INSERT INTO posts VALUES (6, "asd", 1541156269, "Example", "This is an example", 5);
INSERT INTO posts VALUES (7, "asd", 1541156269, "Example", "This is an example", 5);
INSERT INTO posts VALUES (8, "asd", 1541156269, "Example", "This is an example", 5);
