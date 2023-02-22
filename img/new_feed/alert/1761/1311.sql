CREATE TABLE `config` (
  `id` integer PRIMARY KEY AUTO_INCREMENT,
  `id_employee` integer,
  `id_module` integer,
  `seen` tinyint,
  `delete` tinyint,
  `create` tinyint
);

CREATE TABLE `module` (
  `id` integer PRIMARY KEY AUTO_INCREMENT,
  `module_name` varchar(255),
  `module_url` varchar(255),
  `url_icon` varchar(255)
);

CREATE TABLE `group` (
  `id` integer PRIMARY KEY AUTO_INCREMENT,
  `id_company` integer,
  `group_name` varchar(255),
  `id_manager` integer,
  `id_employee` varchar(255),
  `cover_image` varchar(255),
  `group_image` varchar(255),
  `description` text,
  `group_mode` tinyint,
  `created_at` integer,
  `updated_at` integer
);

CREATE TABLE `new_feed` (
  `new_id` integer PRIMARY KEY AUTO_INCREMENT,
  `new_title` varchar(255),
  `author` integer,
  `new_type` integer,
  `id_user_tags` varchar(255),
  `content` text,
  `file` varchar(255),
  `ghim` integer,
  `position` integer,
  `id_company` integer,
  `created_at` integer,
  `updated_at` integer
);

CREATE TABLE `events` (
  `id` integer PRIMARY KEY AUTO_INCREMENT,
  `id_new` integer,
  `avatar` varchar(255),
  `time` integer,
  `description` text,
  `event_mode` integer,
  `speakers_name` varchar(255),
  `speakers_position` varchar(255),
  `speakers_phone` varchar(255),
  `speakers_email` varchar(255),
  `list_guests` text,
  `list_emp_join` varchar(255),
  `list_question` text
);

CREATE TABLE `event_join` (
  `id` integer PRIMARY KEY AUTO_INCREMENT,
  `id_employee` integer,
  `id_event` integer,
  `created_at` integer
);

CREATE TABLE `tbl_voted` (
  `id` integer PRIMARY KEY AUTO_INCREMENT,
  `id_new` integer,
  `answer` text,
  `file` text,
  `time` integer
);

CREATE TABLE `list_answer_bonus` (
  `id` integer PRIMARY KEY AUTO_INCREMENT,
  `id_vote` integer,
  `answer` varchar(255),
  `file` varchar(255)
);

CREATE TABLE `bonus` (
  `id` integer PRIMARY KEY AUTO_INCREMENT,
  `id_new` integer,
  `id_option` integer
);

CREATE TABLE `mail_from_CEO` (
  `id` integer PRIMARY KEY AUTO_INCREMENT,
  `title_mail` varchar(255),
  `content` text,
  `file` varchar(255),
  `user_sent` integer,
  `id_company` integer,
  `option_notify` integer,
  `created_at` integer,
  `updated_at` integer
);

CREATE TABLE `internal_news` (
  `id` integer PRIMARY KEY AUTO_INCREMENT,
  `id_new` integer,
  `cover_image` varchar(255)
);

CREATE TABLE `cover_image` (
  `id` integer PRIMARY KEY AUTO_INCREMENT,
  `id_company` integer,
  `link_image` varchar(255),
  `created_at` integer,
  `updated_at` integer
);

CREATE TABLE `comment` (
  `id` integer PRIMARY KEY AUTO_INCREMENT,
  `id_new` integer,
  `id_user` integer,
  `id_parent` integer,
  `content` text,
  `created_at` integer,
  `updated_at` integer
);

CREATE TABLE `like` (
  `id` integer PRIMARY KEY AUTO_INCREMENT,
  `id_new` integer,
  `id_user` integer,
  `created_at` integer
);

CREATE TABLE `like_comment` (
  `id` integer PRIMARY KEY AUTO_INCREMENT,
  `id_comment` integer,
  `id_user` integer,
  `created_at` integer
);

CREATE TABLE `notify` (
  `id` integer PRIMARY KEY AUTO_INCREMENT,
  `type` integer,
  `id_user` integer,
  `content` varchar(255),
  `created_at` integer,
  `updated_at` integer
);

CREATE TABLE `knowledge` (
  `id` integer PRIMARY KEY AUTO_INCREMENT,
  `id_company` integer,
  `id_user` integer,
  `name` varchar(255),
  `author` varchar(255),
  `description` text,
  `file` varchar(255),
  `user_type` integer,
  `delete` integer,
  `field` varchar(255),
  `created_at` integer,
  `updated_at` integer
);

CREATE TABLE `like_comment_knowledge` (
  `id` integer PRIMARY KEY AUTO_INCREMENT,
  `comment_knowledge_id` integer,
  `id_user` integer,
  `created_at` integer
);
