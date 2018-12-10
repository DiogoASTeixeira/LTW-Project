DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS posts;
DROP TABLE IF EXISTS comments;

CREATE TABLE users
(
    username VARCHAR PRIMARY KEY,
    password VARCHAR NOT NULL
);

CREATE TABLE posts
(
    post_id INTEGER PRIMARY KEY AUTOINCREMENT,
    date DATE NOT NULL,
    title VARCHAR NOT NULL,
    textbody VARCHAR NOT NULL,
    upvotes INTEGER NOT NULL,
    username VARCHAR NOT NULL REFERENCES users
);

CREATE TABLE comments
(
    comment_id INTEGER PRIMARY KEY AUTOINCREMENT,
    date DATE NOT NULL,
    textbody VARCHAR NOT NULL,
    upvotes INTEGER NOT NULL,
    username VARCHAR NOT NULL REFERENCES users,
    post_id INTEGER NOT NULL REFERENCES posts
);


INSERT INTO users VALUES ('admin', '$2y$08$jWmJk/bzd5.eKjf.FaaSMelULahxV3tpGhMGscNKtaq812G7znmm2');

INSERT INTO posts VALUES (1, 1541156269, "Example", "This is an example", 5, "author1");
INSERT INTO posts VALUES (2, 1541156987, "Example 2", "Another Example", 512, "author2");
INSERT INTO posts VALUES (3, 1541156123, "Example 3", "LAst Example", 100876, "author 3");

INSERT INTO comments VALUES(1, 1541156300, "Cool Post", 3, "admin", 1);
INSERT INTO comments VALUES(2, 1541156300, "Thank you OP, very cool", 100, "dabKing", 1);
INSERT INTO comments VALUES(3, 1541156300, "EVERYBODY DAB", 10234, "dabKing", 2);