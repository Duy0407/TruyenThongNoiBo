CREATE TABLE `roles` (
  `role_id` int PRIMARY KEY,
  `role_name` int
);

CREATE TABLE `staff_rights` (
  `staff_right_id` int PRIMARY KEY,
  `role_id` int,
  `staff_id` int,
  `deleted_at` int,
  `created_at` int,
  `updated_at` int
);

CREATE TABLE `information_securitys` (
  `security_id` int PRIMARY KEY,
  `staff_id` int,
  `security_name` varchar(255),
  `time` int,
  `deleted_at` int,
  `created_at` int,
  `updated_at` int
);

CREATE TABLE `projects` (
  `project_id` int PRIMARY KEY,
  `com_id` int,
  `project_name` varchar(255),
  `project_description` text,
  `time_in` int,
  `time_out` int,
  `date_start` int,
  `date_end` int,
  `project_card` varchar(255),
  `project_management` varchar(255),
  `project_member` varchar(255),
  `project_evaluate` varchar(255),
  `project_follow` varchar(255),
  `type` int,
  `deleted_at` int,
  `created_at` int,
  `updated_at` int
);

CREATE TABLE `project_roles` (
  `id` int,
  `staff_id` int,
  `project_id` int,
  `name_role` varchar(255),
  `deleted_at` int,
  `created_at` int,
  `updated_at` int
);

CREATE TABLE `project_role_staffs` (
  `id` int,
  `id_role` int,
  `project_id` int,
  `staff_id` int,
  `deleted_at` int,
  `created_at` int,
  `updated_at` int
);

CREATE TABLE `job_groups` (
  `id` int PRIMARY KEY,
  `project_id` int,
  `name` varchar(255),
  `card` varchar(255),
  `description` varchar(255),
  `type` int,
  `time_in` int,
  `time_out` int,
  `deleted_at` int,
  `created_at` int,
  `updated_at` int
);

CREATE TABLE `jobs` (
  `job_id` int PRIMARY KEY,
  `project_id` int,
  `job_group_id` int,
  `job_name` varchar(255),
  `job_card` int,
  `job_description` varchar(255),
  `date_start` int,
  `date_end` int,
  `result` int,
  `deleted_at` int,
  `created_at` int,
  `updated_at` int
);

CREATE TABLE `job_files` (
  `id` int PRIMARY KEY,
  `job_id` int,
  `deleted_at` int,
  `created_at` int,
  `updated_at` int
);

CREATE TABLE `job_staffs` (
  `id` int PRIMARY KEY,
  `job_id` int,
  `staff_id` int,
  `status` int,
  `deleted_at` int,
  `created_at` int,
  `updated_at` int
);

CREATE TABLE `job_contents` (
  `id` int PRIMARY KEY,
  `staff_id` int,
  `name` varchar(255),
  `time` int,
  `date` int,
  `deleted_at` int,
  `created_at` int,
  `updated_at` int
);

CREATE TABLE `job_comments` (
  `id` int PRIMARY KEY,
  `job_id` int,
  `staff_id` int,
  `conent` varchar(255),
  `deleted_at` int,
  `created_at` int,
  `updated_at` int
);

CREATE TABLE `process` (
  `process_id` int PRIMARY KEY,
  `com_id` int,
  `process_name` varchar(255),
  `process_card` varchar(255),
  `process_management` varchar(255),
  `process_member` varchar(255),
  `process_evaluate` varchar(255),
  `process_follow` varchar(255),
  `process_description` text,
  `process_failure` varchar(255),
  `option` varchar(255),
  `time_in` int,
  `time_out` int,
  `date_start` int,
  `date_end` int,
  `deleted_at` int,
  `created_at` int,
  `updated_at` int
);

CREATE TABLE `process_role_staffs` (
  `id` int PRIMARY KEY,
  `id_role` int,
  `process_id` int,
  `staff_id` int,
  `deleted_at` int,
  `created_at` int,
  `updated_at` int
);

CREATE TABLE `process_stages` (
  `id` int PRIMARY KEY,
  `process_id` int,
  `name` varchar(255),
  `stage_management` varchar(255),
  `stage_member` varchar(255),
  `stage_evaluate` varchar(255),
  `completion_time` int,
  `status_completion_time` int,
  `locations` int,
  `option` varchar(255),
  `time_in` int,
  `time_out` int,
  `date_start` int,
  `date_end` int,
  `result` int,
  `deleted_at` int,
  `created_at` int,
  `updated_at` int
);

CREATE TABLE `stager_missions` (
  `id` int PRIMARY KEY,
  `stage_id` int,
  `name_misssion` varchar(255),
  `card` int,
  `misssion_description` varchar(255),
  `misssion_staff_id` varchar(255),
  `time_in` int,
  `time_out` int,
  `date_start` int,
  `date_end` int,
  `misssion_repeat` int,
  `deleted_at` int,
  `created_at` int,
  `updated_at` int
);

CREATE TABLE `mission_contents` (
  `id` int PRIMARY KEY,
  `mission_id` int,
  `content` text,
  `deleted_at` int,
  `created_at` int,
  `updated_at` int
);

CREATE TABLE `mission_comments` (
  `id` int PRIMARY KEY,
  `mission_id` int,
  `staff_id` text,
  `content` varchar(255),
  `deleted_at` int,
  `created_at` int,
  `updated_at` int
);

CREATE TABLE `stages_locations` (
  `id` int PRIMARY KEY,
  `stage_id` int,
  `locations` int,
  `deleted_at` int,
  `created_at` int,
  `updated_at` int
);

CREATE TABLE `stages_completes` (
  `id` int PRIMARY KEY,
  `stage_id` int,
  `time` int,
  `deleted_at` int,
  `created_at` int,
  `updated_at` int
);

CREATE TABLE `stages_Failures` (
  `id` int PRIMARY KEY,
  `stage_id` int,
  `time` int,
  `deleted_at` int,
  `created_at` int,
  `updated_at` int
);

CREATE TABLE `stages_locks` (
  `id` int PRIMARY KEY,
  `process_id` int,
  `stage_id_start` int,
  `stage_id_end` int,
  `deleted_at` int,
  `created_at` int,
  `updated_at` int
);

CREATE TABLE `staff_folders` (
  `id` int PRIMARY KEY,
  `staff_id` int,
  `name_folde` varchar(255),
  `deleted_at` int,
  `created_at` int,
  `updated_at` int
);

CREATE TABLE `staff_files` (
  `id` int PRIMARY KEY,
  `folde_id` int,
  `name_file` varchar(255),
  `deleted_at` int,
  `created_at` int,
  `updated_at` int
);

CREATE TABLE `file_comments` (
  `id` int PRIMARY KEY,
  `id_files` int,
  `staff_id` int,
  `conent` varchar(255),
  `deleted_at` int,
  `created_at` int,
  `updated_at` int
);

CREATE TABLE `meetings` (
  `id` int PRIMARY KEY,
  `com_id` int,
  `name_meeting` varchar(255),
  `content` text,
  `time_in` int,
  `time_estimated` varchar(255),
  `date_start` int,
  `date_end` int,
  `department_id` int,
  `staff_owner` varchar(255),
  `staff_ecretary` varchar(255),
  `staff_preparation` varchar(255),
  `address_links` varchar(255),
  `type` int,
  `deleted_at` int,
  `created_at` int,
  `updated_at` int
);

CREATE TABLE `meeting_staffs` (
  `id` int PRIMARY KEY,
  `meeting_id` int,
  `staff_id` int,
  `deleted_at` int,
  `created_at` int,
  `updated_at` int
);

CREATE TABLE `meeting_comments` (
  `id` int PRIMARY KEY,
  `meeting_id` int,
  `staff_id` int,
  `content` varchar(255),
  `deleted_at` int,
  `created_at` int,
  `updated_at` int
);

CREATE TABLE `meeting_periodics` (
  `id` int PRIMARY KEY,
  `name_meeting` varchar(255),
  `frequency` int,
  `day` varchar(255),
  `type_meeting` int,
  `conent` text,
  `time_in` int,
  `time_estimated` varchar(255),
  `date_start` int,
  `date_end` int,
  `department_id` int,
  `staff_owner` varchar(255),
  `staff_ecretary` varchar(255),
  `staff_preparation` varchar(255),
  `address_links` varchar(255),
  `deleted_at` int,
  `created_at` int,
  `updated_at` int
);

CREATE TABLE `meeting_periodic_staffs` (
  `id` int PRIMARY KEY,
  `meeting_id` int,
  `staff_id` int,
  `deleted_at` int,
  `created_at` int,
  `updated_at` int
);
