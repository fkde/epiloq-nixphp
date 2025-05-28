CREATE TABLE IF NOT EXISTS `users` (
    `id` INTEGER PRIMARY KEY AUTOINCREMENT,
    `gender` TEXT NOT NULL,
    `username` TEXT NOT NULL,
    `email` TEXT NOT NULL,
    `password` TEXT NOT NULL,
    `birthdate` DATETIME NOT NULL
);

CREATE TABLE IF NOT EXISTS `episodes` (
    `id` INTEGER PRIMARY KEY AUTOINCREMENT,
    `note` TEXT DEFAULT NULL
);

CREATE TABLE IF NOT EXISTS `types` (
    `id` INTEGER PRIMARY KEY AUTOINCREMENT,
    `name` TEXT NOT NULL
);

CREATE TABLE IF NOT EXISTS `episode_type` (
    `episode_id` INTEGER NOT NULL,
    `type_id` INTEGER NOT NULL
);

CREATE TABLE IF NOT EXISTS `symptoms` (
    `id` INTEGER PRIMARY KEY AUTOINCREMENT,
    `name` TEXT NOT NULL
);

CREATE TABLE IF NOT EXISTS `episode_symptom` (
    `episode_id` INTEGER NOT NULL,
    `symptom_id` INTEGER NOT NULL
);

CREATE TABLE IF NOT EXISTS `triggers` (
    `id` INTEGER PRIMARY KEY AUTOINCREMENT,
    `name` TEXT NOT NULL
);

CREATE TABLE IF NOT EXISTS `episode_trigger` (
    `episode_id` INTEGER NOT NULL,
    `trigger_id` INTEGER NOT NULL
);