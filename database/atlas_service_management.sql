-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Време на генериране:  3 май 2021 в 11:32
-- Версия на сървъра: 10.4.18-MariaDB
-- Версия на PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данни: `atlas_service_management`
--

-- --------------------------------------------------------

--
-- Структура на таблица `charts`
--

CREATE TABLE `charts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `tag` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `data_link` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `grafana_link` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `image_link` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `value_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Схема на данните от таблица `charts`
--

INSERT INTO `charts` (`id`, `name`, `description`, `tag`, `data_link`, `grafana_link`, `image_link`, `value_type`) VALUES
(1, 'Slots by Processing', 'The number of running computing slots used by the ATLAS for the last 7 days grouped by Processing type.', 'resourcesreporting', 'https://bigpanda.cern.ch/api/grafana?table=running&groupby=time,resourcesreporting&field=wavg_actualcorecount&resource_type=GRID|hpc|cloud', 'https://monit-grafana.cern.ch/d/000000696/job-accounting-historical-data?from=now-7d-1h%2Fh&orgId=17&to=now-1h%2Fh&var-groupby=resourcesreporting&var-resources=GRID&var-resources=cloud&var-resources=hpc&viewPanel=6&kiosk', 'https://atlasdistributedcomputing-live.web.cern.ch/ATLASDistributedComputing-live/images/BigPanda_BigPandaNormal__image__Slots_by_Processing__6816c18beb187a1e8081ca33e1d0fe3a.png', 'wavg_actualcorecount'),
(2, 'Slots by ADC activity', 'The number of running computing slots used by the ATLAS for the last 7 days grouped by ADC activity. Significant drops of the total should be reported by the CRC shifter. Distribution of the number of slots between different activities depends of the current values of the global shares and the existing loads by activity.', 'adcactivity', 'https://bigpanda.cern.ch/api/grafana?table=running&groupby=time,adcactivity&field=wavg_actualcorecount&resource_type=GRID|hpc|cloud', 'https://monit-grafana.cern.ch/d/000000696/job-accounting-historical-data?from=now-7d-1h%2Fh&orgId=17&to=now-1h%2Fh&var-groupby=adcactivity&var-resources=GRID&var-resources=cloud&var-resources=hpc&viewPanel=6&kiosk', 'https://atlasdistributedcomputing-live.web.cern.ch/ATLASDistributedComputing-live/images/BigPanda_BigPandaNormal__image__Slots_by_ADC_activity__926fa879f65a6027d39bceb37dc93972.png', 'wavg_actualcorecount'),
(3, 'Slots by Job Type', 'The number of running computing slots used by the ATLAS for the last 7 days grouped by Job type. Each job type has similar behavior with respect of the resources it uses - CPU load, IO intensity, RSS requitrements, etc.', 'processingtype', 'https://bigpanda.cern.ch/api/grafana?table=running&groupby=time,processingtype&field=wavg_actualcorecount&resource_type=GRID|hpc|cloud', 'https://monit-grafana.cern.ch/d/000000696/job-accounting-historical-data?from=now-7d-1h%2Fh&orgId=17&to=now-1h%2Fh&var-groupby=processingtype&var-resources=GRID&var-resources=cloud&var-resources=hpc&viewPanel=6&kiosk', 'https://atlasdistributedcomputing-live.web.cern.ch/ATLASDistributedComputing-live/images/BigPanda_BigPandaNormal__image__Slots_by_Job_Type__03feab7573a3261a4f517bde0ca8ed4a.png', 'wavg_actualcorecount'),
(4, 'Slots vs n-cores', 'The number of running computing slots used by the ATLAS for the last 7 days grouped by number of cores. The standard ATLAS requirement for a GRID site is single and 8-core slots which means that most of the entries in this plot for GRID resources should be 8 or 1-core. All the rest are special cases which exist due to external limitations.', 'actualcorecount', 'https://bigpanda.cern.ch/api/grafana?table=running&groupby=time,actualcorecount&field=wavg_actualcorecount&resource_type=GRID|hpc|cloud', 'https://monit-grafana.cern.ch/d/000000696/job-accounting-historical-data?from=now-7d-1h%2Fh&orgId=17&to=now-1h%2Fh&var-groupby=actualcorecount&var-resources=GRID&var-resources=cloud&var-resources=hpc&viewPanel=6&kiosk', 'https://atlasdistributedcomputing-live.web.cern.ch/ATLASDistributedComputing-live/images/BigPanda_BigPandaNormal__image__Slots_vs_n-cores__ebea42c6d29edebd1499a8416ac14ba9.png', 'wavg_actualcorecount'),
(5, 'Slots by processing clouds', 'The number of running computing slots used by the ATLAS for the last 7 days grouped by ATLAS Cloud. The computing sites in different ATLAS clouds are grouped either by geographical closeness or by funding source or both.', 'dst_cloud', 'https://bigpanda.cern.ch/api/grafana?table=running&groupby=time,dst_cloud&field=wavg_actualcorecount&resource_type=GRID|hpc|cloud', 'https://monit-grafana.cern.ch/d/000000696/job-accounting-historical-data?from=now-7d-1h%2Fh&orgId=17&to=now-1h%2Fh&var-groupby=dst_cloud&var-resources=GRID&var-resources=cloud&var-resources=hpc&viewPanel=6&kiosk', 'https://atlasdistributedcomputing-live.web.cern.ch/ATLASDistributedComputing-live/images/BigPanda_BigPandaNormal__image__Slots_by_processing_clouds__c3e192464160cd51f0ff92d499b70b0d.png', 'wavg_actualcorecount'),
(6, 'Slots by panda resources', 'The number of running computing slots used by the ATLAS for the last 7 days grouped by Panda Resources. Panda is the core of the the workflow management system of ATLAS. A resource in Panda is generally the same as a computing site.', 'dst_official_site', 'https://bigpanda.cern.ch/api/grafana?table=running&groupby=time,dst_official_site&field=wavg_actualcorecount&resource_type=GRID|hpc|cloud', 'https://monit-grafana.cern.ch/d/000000696/job-accounting-historical-data?from=now-7d-1h%2Fh&orgId=17&to=now-1h%2Fh&var-groupby=dst_official_site&var-resources=GRID&var-resources=cloud&var-resources=hpc&viewPanel=6&kiosk', 'https://atlasdistributedcomputing-live.web.cern.ch/ATLASDistributedComputing-live/images/BigPanda_BigPandaNormal__image__Slots_by_panda_resources__af5252abbd77f4e5817b4d4d74876f31.png', 'wavg_actualcorecount'),
(7, 'Slots of running jobs HS06', 'The amount of resources used by ATLAS for different ADC activities for the last 7 days in units of HS06. HS06 is a benchmarking suit which is currently used to evaluate the performance of the hardware utilized on the GRID. This is plot represens the actual resources used for a given ADC Activity unbiased with respect of the different hardware utilized by the different computing sites.', 'resourcesreporting', 'https://bigpanda.cern.ch/api/grafana?table=running&groupby=time,resourcesreporting&field=wavg_hs06&resource_type=GRID|hpc|cloud', 'https://monit-grafana.cern.ch/d/000000696/job-accounting-historical-data?from=now-7d-1h%2Fh&orgId=17&to=now-1h%2Fh&var-groupby=resourcesreporting&var-resources=GRID&var-resources=cloud&var-resources=hpc&viewPanel=139&kiosk', 'https://atlasdistributedcomputing-live.web.cern.ch/ATLASDistributedComputing-live/images/BigPanda_BigPandaNormal__image__Slots_of_running_jobs_HS06__66355792b81e9b9e3491a55836819536.png', 'wavg_hs06'),
(8, 'Bytes processed', 'Size of the input data processed by ATLAS for the last 7 days grouped by the type of processing.', 'resourcesreporting', 'https://bigpanda.cern.ch/api/grafana?table=completed&groupby=time,resourcesreporting&field=sum_inputfilebytes&resource_type=GRID|hpc|cloud', 'https://monit-grafana.cern.ch/goto/O9jzp_rMk', 'https://atlasdistributedcomputing-live.web.cern.ch/ATLASDistributedComputing-live/images/BigPanda_BigPandaNormal__image__Bytes_processed__15d9f6dd3853f02a9186ccb30ee5b6e8.png', 'sum_inputfilebytes'),
(9, 'Files processed', 'The number of input data processed by ATLAS for the last 7 days grouped by the type of processing.', 'resourcesreporting', 'https://bigpanda.cern.ch/api/grafana?table=completed&groupby=time,resourcesreporting&field=sum_ninputdatafiles&resource_type=GRID|hpc|cloud', 'https://monit-grafana.cern.ch/goto/lwK7p_rGz', 'https://atlasdistributedcomputing-live.web.cern.ch/ATLASDistributedComputing-live/images/BigPanda_BigPandaNormal__image__Files_processed__53fd920fe7223632716c4a43b2799a51.png', 'sum_ninputdatafiles'),
(10, 'Events processed', 'The number of proton-proton collisions processed by ATLAS for the last 7 days grouped by the type of processing.', 'resourcesreporting', 'https://bigpanda.cern.ch/api/grafana?table=completed&groupby=time,resourcesreporting&field=sum_nevents&resource_type=GRID|hpc|cloud', 'https://monit-grafana.cern.ch/goto/9AMVpl9Gz', 'https://atlasdistributedcomputing-live.web.cern.ch/ATLASDistributedComputing-live/images/BigPanda_BigPandaNormal__image__Events_processed__18920f1522674de2df198fc0c83916bd.png', 'sum_nevents'),
(11, 'Events simul+pile', 'The number of simulated and reconstructed Monte Carlo proton-proton collisions in the last 7 days.', 'resourcesreporting', 'https://bigpanda.cern.ch/api/grafana?table=completed&groupby=time,resourcesreporting&field=sum_nevents&resource_type=GRID|hpc|cloud&processingtype=pile|simul', 'https://monit-grafana.cern.ch/goto/_Nj4tl9Gz', 'https://atlasdistributedcomputing-live.web.cern.ch/ATLASDistributedComputing-live/images/BigPanda_BigPandaNormal__image__Events_simul_pile__95bdeeeda93f407d7e9684db92da12fe.png', 'sum_nevents'),
(12, 'Events merge+pmerge', 'The number of events processed in file merging jobs in the last 7 days.', 'resourcesreporting', 'https://bigpanda.cern.ch/api/grafana?table=completed&groupby=time,resourcesreporting&field=sum_nevents&resource_type=GRID|hpc|cloud&processingtype=merge|pmerge', 'https://monit-grafana.cern.ch/goto/1X1IplrMk', 'https://atlasdistributedcomputing-live.web.cern.ch/ATLASDistributedComputing-live/images/BigPanda_BigPandaNormal__image__Events_merge_pmerge__286b12bf11ea5205115735b4b7cb7b8e.png', 'sum_nevents'),
(13, 'WallClock Consumption', 'The wallclock time spent in the last seven days produced by all ATLAS distributed computing jobs grouped by the final status of the corresponding job.', 'jobstatus', 'https://bigpanda.cern.ch/api/grafana?table=completed&groupby=time,jobstatus&field=sum_walltime&resource_type=GRID|hpc|cloud', 'https://monit-grafana.cern.ch/goto/H3SNplrMz', 'https://atlasdistributedcomputing-live.web.cern.ch/ATLASDistributedComputing-live/images/BigPanda_BigPandaNormal__image__WallClock_Consumption__41f5d83426cf2e984c63fd1dee0a8dbc.png', 'sum_walltime'),
(14, 'WallClock Consumption w/o analysis', 'The wallclock time spent in the last seven days produced by ATLAS central production jobs grouped by the final status of the corresponding job.', 'jobstatus', 'https://bigpanda.cern.ch/api/grafana?table=completed&groupby=time,jobstatus&field=sum_walltime&resource_type=GRID|hpc|cloud&resourcesreporting=Data+Processing|Group+Production|MC+Reconstruction|MC+Simulation|Others', 'https://monit-grafana.cern.ch/goto/9t6Nt_rGz', 'https://atlasdistributedcomputing-live.web.cern.ch/ATLASDistributedComputing-live/images/BigPanda_BigPandaNormal__image__WallClock_Consumption_w_o_analysis__7665121f2dd6f0c96bfc4e0ee2dd3fa3.png', 'sum_walltime');

-- --------------------------------------------------------

--
-- Структура на таблица `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `connection` text COLLATE utf8_unicode_ci NOT NULL,
  `queue` text COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура на таблица `incidents`
--

CREATE TABLE `incidents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `number` int(11) NOT NULL DEFAULT 10000,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `impact` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `urgency` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `priority` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `short_description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура на таблица `incident_user`
--

CREATE TABLE `incident_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `incident_id` bigint(20) UNSIGNED NOT NULL,
  `caller_id` bigint(20) UNSIGNED NOT NULL,
  `executor_id` bigint(20) UNSIGNED NOT NULL,
  `model_from` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура на таблица `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Схема на данните от таблица `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_12_20_232519_create_charts_table', 1),
(5, '2021_02_04_101711_create_roles_table', 1),
(6, '2021_02_04_103022_create_model_has_roles_table', 1),
(7, '2021_02_11_083714_create_teams_table', 1),
(8, '2021_02_12_083228_create_team_user_table', 1),
(9, '2021_02_12_083532_create_team_role_table', 1),
(10, '2021_02_16_070757_create_incidents_table', 1),
(11, '2021_02_18_185608_create_incident_user_table', 1),
(12, '2021_03_10_092911_create_team_incident_table', 1);

-- --------------------------------------------------------

--
-- Структура на таблица `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `model_from` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Схема на данните от таблица `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`, `model_from`) VALUES
(1, 'App\\Http\\Api\\User\\Models\\User', 1, 'App\\Http\\Api\\User\\Models\\User'),
(2, 'App\\Http\\Api\\User\\Models\\User', 2, 'App\\Http\\Api\\User\\Models\\User'),
(3, 'App\\Http\\Api\\User\\Models\\User', 3, 'App\\Http\\Api\\User\\Models\\User'),
(18, 'App\\Http\\Api\\User\\Models\\User', 4, 'App\\Http\\Api\\User\\Models\\User');

-- --------------------------------------------------------

--
-- Структура на таблица `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура на таблица `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Схема на данните от таблица `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Admin is a role, which is set on the main user. He has all permissions and can manage anything.', 'web', '2021-05-03 09:26:41', '2021-05-03 09:26:41'),
(2, 'ess', 'Employee Self Service is a role, which is set on the default user.', 'web', '2021-05-03 09:26:42', '2021-05-03 09:26:42'),
(3, 'manager_chart', 'Manager Chart is a role, which is set on the general manager of the table, charts. He can manage anything about charts.', 'web', '2021-05-03 09:26:42', '2021-05-03 09:26:42'),
(4, 'manager_chart_slots_by_processing', 'Manager Chart Slots by Processing is a role, which is set on the manager of the table, also he can manage anything about slots by processing chart.', 'web', '2021-05-03 09:26:42', '2021-05-03 09:26:42'),
(5, 'manager_chart_slots_by_adc_activity', 'Manager Chart Slots By ADC activity is a role, which is set on the manager of the table, also he can manage anything about slots by adc activity chart.', 'web', '2021-05-03 09:26:42', '2021-05-03 09:26:42'),
(6, 'manager_chart_slots_by_job_type', 'Manager Chart Slots by Job Type is a role, which is set on the manager of the table, also he can manage anything about slots by job type chart.', 'web', '2021-05-03 09:26:42', '2021-05-03 09:26:42'),
(7, 'manager_chart_slots_vs_n-cores', 'Manager Chart Slots vs n-cores, which is set on the manager of the table, also he can manage anything about slots by n-cores chart.', 'web', '2021-05-03 09:26:42', '2021-05-03 09:26:42'),
(8, 'manager_chart_slots_by_processing_clouds', 'Manager Chart Slots by processing clouds is a role, which is set on the manager of the table, also he can manage anything about slots by processing clouds chart.', 'web', '2021-05-03 09:26:42', '2021-05-03 09:26:42'),
(9, 'manager_chart_slots_by_panda_resources', 'Manager Chart Slots by panda resources is a role, which is set on the manager of the table, also he can manage anything about slots by panda resources chart.', 'web', '2021-05-03 09:26:42', '2021-05-03 09:26:42'),
(10, 'manager_chart_slots_of_running_jobs_hs06', 'Manager Chart Slots of running jobs HS06 is a role, which is set on the manager of the table, also he can manage anything about slots of running jobs HS06 chart.', 'web', '2021-05-03 09:26:42', '2021-05-03 09:26:42'),
(11, 'manager_chart_bytes_processed', 'Manager Chart Bytes processed is a role, which is set on the manager of the table, also he can manage anything about bytes processed chart.', 'web', '2021-05-03 09:26:42', '2021-05-03 09:26:42'),
(12, 'manager_chart_files_processed', 'Manager Chart Files processed is a role, which is set on the manager of the table, also he can manage anything about files processed chart.', 'web', '2021-05-03 09:26:42', '2021-05-03 09:26:42'),
(13, 'manager_chart_events_processed', 'Manager Chart Events processed is a role, which is set on the manager of the table, also he can manage anything about events processed chart.', 'web', '2021-05-03 09:26:42', '2021-05-03 09:26:42'),
(14, 'manager_chart_events_simul+pile', 'Manager Chart Events simul+pile is a role, which is set on the manager of the table, also he can manage anything about events simul+pile chart.', 'web', '2021-05-03 09:26:42', '2021-05-03 09:26:42'),
(15, 'manager_chart_events_merge+pmerge', 'Manager Chart Events merge+pmerge is a role, which is set on the manager of the table, also he can manage anything about events merge+pmerge chart.', 'web', '2021-05-03 09:26:42', '2021-05-03 09:26:42'),
(16, 'manager_chart_wallclock_consumption', 'Manager Chart WallClock Consumption is a role, which is set on the manager of the table, also he can manage anything about wallclock consumption chart.', 'web', '2021-05-03 09:26:42', '2021-05-03 09:26:42'),
(17, 'manager_chart_wallclock_consumption_w/o_analysis', 'Manager Chart WallClock Consumption w/o analysis is a role, which is set on the manager of the table, also he can manage anything about wallclock consumption w/o analysis chart.', 'web', '2021-05-03 09:26:42', '2021-05-03 09:26:42'),
(18, 'manager_table', 'Manager Table is a role, which is set on the general manager of the table, tables. He can manage anything about tables.', 'web', '2021-05-03 09:26:43', '2021-05-03 09:26:43'),
(19, 'manager_table_slots_by_processing', 'Manager Table Slots by Processing is a role, which is set on the manager of the table, also he can manage anything about slots by processing table.', 'web', '2021-05-03 09:26:43', '2021-05-03 09:26:43'),
(20, 'manager_table_slots_by_adc_activity', 'Manager Table Slots By ADC activity is a role, which is set on the manager of the table, also he can manage anything about slots by adc activity table.', 'web', '2021-05-03 09:26:43', '2021-05-03 09:26:43'),
(21, 'manager_table_slots_by_job_type', 'Manager Table Slots by Job Type is a role, which is set on the manager of the table, also he can manage anything about slots by job type table.', 'web', '2021-05-03 09:26:43', '2021-05-03 09:26:43'),
(22, 'manager_table_slots_vs_n-cores', 'Manager Table Slots vs n-cores, which is set on the manager of the table, also he can manage anything about slots by n-cores table.', 'web', '2021-05-03 09:26:43', '2021-05-03 09:26:43'),
(23, 'manager_table_slots_by_processing_clouds', 'Manager Table Slots by processing clouds is a role, which is set on the manager of the table, also he can manage anything about slots by processing clouds table.', 'web', '2021-05-03 09:26:43', '2021-05-03 09:26:43'),
(24, 'manager_table_slots_by_panda_resources', 'Manager Table Slots by panda resources is a role, which is set on the manager of the table, also he can manage anything about slots by panda resources table.', 'web', '2021-05-03 09:26:43', '2021-05-03 09:26:43'),
(25, 'manager_table_slots_of_running_jobs_hs06', 'Manager Table Slots of running jobs HS06 is a role, which is set on the manager of the table, also he can manage anything about slots of running jobs HS06 table.', 'web', '2021-05-03 09:26:43', '2021-05-03 09:26:43'),
(26, 'manager_table_bytes_processed', 'Manager Table Bytes processed is a role, which is set on the manager of the table, also he can manage anything about bytes processed table.', 'web', '2021-05-03 09:26:43', '2021-05-03 09:26:43'),
(27, 'manager_table_files_processed', 'Manager Table Files processed is a role, which is set on the manager of the table, also he can manage anything about files processed table.', 'web', '2021-05-03 09:26:43', '2021-05-03 09:26:43'),
(28, 'manager_table_events_processed', 'Manager Table Events processed is a role, which is set on the manager of the table, also he can manage anything about events processed table.', 'web', '2021-05-03 09:26:43', '2021-05-03 09:26:43'),
(29, 'manager_table_events_simul+pile', 'Manager Table Events simul+pile is a role, which is set on the manager of the table, also he can manage anything about events simul+pile table.', 'web', '2021-05-03 09:26:43', '2021-05-03 09:26:43'),
(30, 'manager_table_events_merge+pmerge', 'Manager Table Events merge+pmerge is a role, which is set on the manager of the table, also he can manage anything about events merge+pmerge table.', 'web', '2021-05-03 09:26:43', '2021-05-03 09:26:43'),
(31, 'manager_table_wallclock_consumption', 'Manager Table WallClock Consumption is a role, which is set on the manager of the table, also he can manage anything about wallclock consumption table.', 'web', '2021-05-03 09:26:43', '2021-05-03 09:26:43'),
(32, 'manager_table_wallclock_consumption_w/o_analysis', 'Manager Table WallClock Consumption w/o analysis is a role, which is set on the manager of the table, also he can manage anything about wallclock consumption w/o analysis table.', 'web', '2021-05-03 09:26:43', '2021-05-03 09:26:43');

-- --------------------------------------------------------

--
-- Структура на таблица `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `owner_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'default.png',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура на таблица `team_incident`
--

CREATE TABLE `team_incident` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `incident_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура на таблица `team_role`
--

CREATE TABLE `team_role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура на таблица `team_user`
--

CREATE TABLE `team_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура на таблица `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `middle_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'default.png',
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_login_ip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_login_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Схема на данните от таблица `users`
--

INSERT INTO `users` (`id`, `first_name`, `middle_name`, `last_name`, `email`, `password`, `avatar`, `token`, `description`, `city`, `country`, `last_login_ip`, `last_login_at`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Admin', 'Admin', 'admin@admin.com', '$2y$10$41X.GL7B5e60QDDySrmdj.1rnIeuyyR7/IRVDjkObyfoT/ev48tHe', 'avatars/default.png', 'ZMR9NXavD9tTYHvr4PPVIACuWxjvezPzpn0GryMYzI7wCB43d4s3gNu5gyic8oB12hxZZ7ZzSpbHnfKTdA4NoUZ4WgUUbj5Oqy7t1kk29E2fU44gxTxW5NYwP4rg7Z7gkUawbaNb6MDM98Vdp104v68z9H7P19gFkts63i3iia82rffzeDx2345SuzWCcMeXdiJmbXRxDUByGZObK2C43az5rzlpabOyhH50tsAhEH6FFavSa0QVLQCdyIMMsDe', NULL, NULL, NULL, NULL, NULL, '2021-05-03 09:26:43', '2021-05-03 09:26:43'),
(2, 'Employee', 'Self', 'Service', 'ess@ess.com', '$2y$10$f.ocERxoG0cdo8yJYthY9uFAJ0yLY.6jmUyurAHtdc1HFeiSqfxia', 'avatars/default.png', 'FhmxbaBEOkXDbCwLFOVbI9ONqJMt3dpmO8aHUS3InqVjPGrktZHJqhFv8YNTGD5RkXlIxCAHVKfEKTyhLFgFmdKVppv0sGfTVIol8UZQkF1YJijH02Xl5sXzz4jrkRyBr4P1eMlT0W5daAqDyyd34xhGsFdfH6IFJkNu1aEW8eNB7RWghQn77DV7ZTqsnioTpHsHSVe71OEHBzvkD7hiRsRfVYszmLIrE7zWhn6OZdgCzjLOVt01lwKDdwro3C5', NULL, NULL, NULL, NULL, NULL, '2021-05-03 09:26:44', '2021-05-03 09:26:44'),
(3, 'Manager', 'Chart', 'Chart', 'managerchart@managerchart.com', '$2y$10$z4eJq2XqIZpZBWFa7jEJuuSTHqEJbxIZYht8OjTy3fF7XVYJMDU4a', 'avatars/default.png', 'MQMRsOJynOtPS5U8e7Z0zNl6SuolZCqPCvWDrfn38PIyYCuWRelNJOYqcy1K0Q5nilci10oJ7Bt7Css2eqtuOJkFD0GrQtSvRCYf4nFURCb2WRpvHabgTa4OrnKPwLWhavFYsf6vxqFne8zlL1ot46UyPCoMgptL4ORJAm044BzGFvEcgt3KDe5CyIMWA6Z63n5i9FQq9t4Qk2JfkdszuBylgBpZNDUEnPMX1zmTzRrrdNtHIFFBkG5fwnEvKMH', NULL, NULL, NULL, NULL, NULL, '2021-05-03 09:26:44', '2021-05-03 09:26:44'),
(4, 'Manager', 'Table', 'Table', 'managertable@managertable.com', '$2y$10$yTI5VpzJqbS.LHMk6s8KoeqTMYWry3XzrmGEE5EplGcfVpEP0JPTG', 'avatars/default.png', 'bFDZCUfHxLDFP4ZZaXneyM9UwUaXQRwgzLOlv66qD9eju1ENiES35kZx8Qg0hCVLXgNtYESJWAPdLe3037pFvdSFKN5L8GM9ZPMijs7PJnswsHn2iZDRtq62M3UIvoDe8fCOIgBFsznkbPSxyeftKhp0SNY3CUxEMj6Quprt3nWjWzw8ngJU64Q4SVCYmBL84ukDm8pYDKjjz34U1ysUmZ3vB2CpZf8aEunQ9EPg6wPPxlGItOcC3lNcNipOvhX', NULL, NULL, NULL, NULL, NULL, '2021-05-03 09:26:44', '2021-05-03 09:26:44');

--
-- Indexes for dumped tables
--

--
-- Индекси за таблица `charts`
--
ALTER TABLE `charts`
  ADD PRIMARY KEY (`id`);

--
-- Индекси за таблица `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Индекси за таблица `incidents`
--
ALTER TABLE `incidents`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `incidents_number_unique` (`number`),
  ADD KEY `incidents_category_id_foreign` (`category_id`);

--
-- Индекси за таблица `incident_user`
--
ALTER TABLE `incident_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `incident_caller_executor_model_unique` (`incident_id`,`caller_id`,`executor_id`,`model_from`),
  ADD KEY `incident_user_caller_id_foreign` (`caller_id`),
  ADD KEY `incident_user_executor_id_foreign` (`executor_id`);

--
-- Индекси за таблица `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индекси за таблица `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`,`model_from`),
  ADD KEY `user_has_roles_model_id_model_type_model_from_index` (`model_id`,`model_type`,`model_from`);

--
-- Индекси за таблица `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индекси за таблица `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Индекси за таблица `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `teams_name_unique` (`name`),
  ADD KEY `teams_owner_id_index` (`owner_id`);

--
-- Индекси за таблица `team_incident`
--
ALTER TABLE `team_incident`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `team_incident_team_id_incident_id_unique` (`team_id`,`incident_id`),
  ADD KEY `team_incident_incident_id_foreign` (`incident_id`);

--
-- Индекси за таблица `team_role`
--
ALTER TABLE `team_role`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `team_role_team_id_role_id_unique` (`team_id`,`role_id`);

--
-- Индекси за таблица `team_user`
--
ALTER TABLE `team_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `team_user_team_id_user_id_unique` (`team_id`,`user_id`),
  ADD KEY `team_user_user_id_foreign` (`user_id`);

--
-- Индекси за таблица `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_token_unique` (`token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `charts`
--
ALTER TABLE `charts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `incidents`
--
ALTER TABLE `incidents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `incident_user`
--
ALTER TABLE `incident_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `team_incident`
--
ALTER TABLE `team_incident`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `team_role`
--
ALTER TABLE `team_role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `team_user`
--
ALTER TABLE `team_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ограничения за дъмпнати таблици
--

--
-- Ограничения за таблица `incidents`
--
ALTER TABLE `incidents`
  ADD CONSTRAINT `incidents_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `charts` (`id`);

--
-- Ограничения за таблица `incident_user`
--
ALTER TABLE `incident_user`
  ADD CONSTRAINT `incident_user_caller_id_foreign` FOREIGN KEY (`caller_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `incident_user_executor_id_foreign` FOREIGN KEY (`executor_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `incident_user_incident_id_foreign` FOREIGN KEY (`incident_id`) REFERENCES `incidents` (`id`) ON DELETE CASCADE;

--
-- Ограничения за таблица `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ограничения за таблица `team_incident`
--
ALTER TABLE `team_incident`
  ADD CONSTRAINT `team_incident_incident_id_foreign` FOREIGN KEY (`incident_id`) REFERENCES `incidents` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `team_incident_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE;

--
-- Ограничения за таблица `team_role`
--
ALTER TABLE `team_role`
  ADD CONSTRAINT `team_role_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE;

--
-- Ограничения за таблица `team_user`
--
ALTER TABLE `team_user`
  ADD CONSTRAINT `team_user_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `team_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
