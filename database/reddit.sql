DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS posts;
DROP TABLE IF EXISTS comments;
DROP TABLE IF EXISTS post_votes;
DROP TABLE IF EXISTS comment_votes;


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

CREATE TABLE post_votes
(
    username VARCHAR NOT NULL REFERENCES users,
    post_id INTEGER NOT NULL REFERENCES posts,
    vote_value TINYINT NOT NULL
);

CREATE TABLE comment_votes
(
    username VARCHAR NOT NULL REFERENCES users,
    comment_id INTEGER NOT NULL REFERENCES comments,
    vote_value TINYINT NOT NULL
);

INSERT INTO users VALUES ('admin', '$2y$08$jWmJk/bzd5.eKjf.FaaSMelULahxV3tpGhMGscNKtaq812G7znmm2');
INSERT INTO users VALUES ('dabKing', '$2y$08$Oy4RuK8sO7EJixxWUx/7ceFU9QN6QDZem4gTQw/ciTs8IRHsH3bXa');
INSERT INTO users VALUES ('bush911', '$2y$08$ky1s1OPoIMczsYUeoFyMcuZBA5j1zrK7KwW7O62MN/g2GHnDYXLRW');


INSERT INTO posts VALUES (1, 1541156987, "Best Star Wars quote", "I don't like sand.", 1, "admin");
INSERT INTO posts VALUES (2, 1541156269, "The secret to happiness", "It's a secret", 2, "dabKing");
INSERT INTO posts VALUES (3, 1541156123, "The truth about the twin towers", "My username", 0, "bush911");

INSERT INTO comments VALUES(1, 1541156300, "Cool Post", 3, "admin", 1);
INSERT INTO comments VALUES(2, 1541156300, "Thank you OP, very cool", 100, "dabKing", 1);
INSERT INTO comments VALUES(3, 1541156300, "EVERYBODY DAB", 10234, "dabKing", 2);


INSERT INTO post_votes VALUES("admin", 1, 1);
INSERT INTO post_votes VALUES("admin", 2, 1);
INSERT INTO post_votes VALUES("dabKing", 2, 1);
INSERT INTO post_votes VALUES("dabKing", 3, -1);
INSERT INTO post_votes VALUES("admin", 3, 1);
