-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2019 at 07:46 PM
-- Server version: 5.7.25
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stackb`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_balances`
--

CREATE TABLE `account_balances` (
  `id` int(10) UNSIGNED NOT NULL,
  `workspace_id` int(11) UNSIGNED NOT NULL,
  `account_id` int(11) DEFAULT NULL,
  `currency_id` int(11) DEFAULT NULL,
  `balance` decimal(16,4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `app_password_manager`
--

CREATE TABLE `app_password_manager` (
  `id` int(11) UNSIGNED NOT NULL,
  `workspace_id` int(11) UNSIGNED NOT NULL,
  `client_id` int(11) DEFAULT NULL,
  `type` varchar(200) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `url` varchar(200) DEFAULT NULL,
  `username` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `notes` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `app_settings`
--

CREATE TABLE `app_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `app_sms`
--

CREATE TABLE `app_sms` (
  `id` int(11) NOT NULL,
  `workspace_id` int(11) UNSIGNED NOT NULL,
  `req_time` datetime DEFAULT NULL,
  `sent_time` datetime DEFAULT NULL,
  `sms_from` text,
  `sms_to` text,
  `sms` text,
  `driver` text,
  `resp` text,
  `status` varchar(200) DEFAULT NULL,
  `stype` varchar(200) NOT NULL DEFAULT 'Sent',
  `cid` int(11) DEFAULT NULL,
  `aid` int(11) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `iid` int(11) DEFAULT NULL,
  `trid` int(11) DEFAULT NULL,
  `lid` int(11) DEFAULT NULL,
  `oid` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `app_sms_drivers`
--

CREATE TABLE `app_sms_drivers` (
  `id` int(11) NOT NULL,
  `workspace_id` int(11) UNSIGNED NOT NULL,
  `dname` varchar(200) DEFAULT NULL,
  `handler` varchar(200) DEFAULT NULL,
  `weburl` varchar(200) DEFAULT NULL,
  `description` text,
  `url` varchar(200) DEFAULT NULL,
  `incoming_url` varchar(200) DEFAULT NULL,
  `method` varchar(50) DEFAULT NULL,
  `username` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `api_key` varchar(200) DEFAULT NULL,
  `api_secret` varchar(200) DEFAULT NULL,
  `route` varchar(200) DEFAULT NULL,
  `sender_id` varchar(100) DEFAULT NULL,
  `balance` decimal(14,2) DEFAULT NULL,
  `placeholder` text,
  `status` varchar(100) DEFAULT NULL,
  `is_active` int(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `app_sms_templates`
--

CREATE TABLE `app_sms_templates` (
  `id` int(11) NOT NULL,
  `workspace_id` int(11) UNSIGNED NOT NULL,
  `tpl` varchar(200) DEFAULT NULL,
  `sms` text,
  `status` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `app_sms_templates`
--

INSERT INTO `app_sms_templates` (`id`, `workspace_id`, `tpl`, `sms`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Invoice Created', 'Your Invoice- {{invoice_id}} is created. To view your invoice- {{invoice_url}}', NULL, NULL, '2017-11-23 03:59:37'),
(2, 1, 'Invoice Payment Reminder', 'We have not received payment for invoice {{invoice_id}}, dated {{invoice_date}}. To view your invoice- {{invoice_url}}', NULL, NULL, '2017-11-23 04:01:14'),
(3, 1, 'Invoice Overdue Notice', 'Your Invoice- {{invoice_id}} is now overdue. To view your invoice- {{invoice_url}}', NULL, NULL, '2017-11-23 03:59:20'),
(4, 1, 'Invoice Payment Confirmation', 'We have received your Payment for Invoice ID- {{invoice_id}}', NULL, NULL, '2017-11-23 04:02:15'),
(5, 1, 'Invoice Refund Confirmation', 'Your Payment for {{invoice_id}} has been refunded.', NULL, NULL, '2017-11-23 04:03:19'),
(6, 1, 'Quote Created', 'A Quote has been created- {{quote_id}}. You can view this Quote- {{quote_url}}', NULL, NULL, '2017-11-23 04:03:19'),
(7, 1, 'Quote Accepted', 'Thanks for Accepting Quote - {{quote_id}}. You can view this Quote- {{quote_url}}', NULL, NULL, '2017-11-23 04:03:19'),
(8, 1, 'Quote Cancelled', 'Quote has been cancelled - {{quote_id}}. You can view this Quote- {{quote_url}}', NULL, NULL, '2017-11-23 04:03:19'),
(9, 1, 'Quote Accepted: Admin Notification', 'Quote - {{quote_id}} has been accepted. You can view this Quote- {{quote_url}}', NULL, NULL, '2017-11-23 04:03:19'),
(10, 1, 'Quote Cancelled: Admin Notification', 'Quote - {{quote_id}} has been Cancelled. You can view this Quote- {{quote_url}}', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

CREATE TABLE `assets` (
  `id` int(10) UNSIGNED NOT NULL,
  `workspace_id` int(10) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `asset` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_purchased` date DEFAULT NULL,
  `supported_until` date DEFAULT NULL,
  `price` decimal(16,4) DEFAULT NULL,
  `depreciation` decimal(16,4) DEFAULT NULL,
  `serial` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `employee_id` int(10) UNSIGNED DEFAULT NULL,
  `contact_id` int(10) UNSIGNED DEFAULT NULL,
  `location_id` int(10) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `workspace_id` int(10) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from_account_id` int(10) UNSIGNED DEFAULT NULL,
  `contact_id` int(10) UNSIGNED DEFAULT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `next_date` date NOT NULL,
  `last_paid_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `currency` char(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `net_amount` decimal(16,8) NOT NULL,
  `recurring_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remind_days_before` smallint(5) UNSIGNED NOT NULL DEFAULT '0',
  `add_transaction_automatically` tinyint(1) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_paid` tinyint(1) NOT NULL DEFAULT '0',
  `is_skipped` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `clx_integrations`
--

CREATE TABLE `clx_integrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `secret` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_default` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `clx_shared_preferences`
--

CREATE TABLE `clx_shared_preferences` (
  `id` int(10) UNSIGNED NOT NULL,
  `workspace_id` int(11) DEFAULT NULL,
  `relation_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `relation_id` int(10) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `credit_cards`
--

CREATE TABLE `credit_cards` (
  `id` int(10) UNSIGNED NOT NULL,
  `workspace_id` int(11) UNSIGNED NOT NULL,
  `contact_id` int(10) UNSIGNED NOT NULL,
  `card_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_holder_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_number` char(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expiry_month` char(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expiry_year` char(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cvv` char(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `crm_accounts`
--

CREATE TABLE `crm_accounts` (
  `id` int(11) NOT NULL,
  `workspace_id` int(11) UNSIGNED NOT NULL,
  `uuid` char(36) DEFAULT NULL,
  `account` varchar(200) DEFAULT NULL,
  `fname` varchar(100) DEFAULT NULL,
  `lname` varchar(100) DEFAULT NULL,
  `company` varchar(200) DEFAULT NULL,
  `business_number` varchar(200) DEFAULT NULL,
  `jobtitle` varchar(100) DEFAULT NULL,
  `cid` int(11) DEFAULT NULL,
  `o` int(11) DEFAULT '0',
  `phone` varchar(100) DEFAULT NULL,
  `fax` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `zip` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `balance` decimal(16,2) DEFAULT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `notes` text,
  `options` text,
  `tags` text,
  `password` text,
  `token` text,
  `ts` text,
  `img` varchar(100) DEFAULT NULL,
  `web` varchar(200) DEFAULT NULL,
  `facebook` varchar(100) DEFAULT NULL,
  `google` varchar(100) DEFAULT NULL,
  `linkedin` varchar(100) DEFAULT NULL,
  `twitter` varchar(100) DEFAULT NULL,
  `skype` varchar(100) DEFAULT NULL,
  `tax_number` varchar(100) DEFAULT NULL,
  `entity_number` varchar(100) DEFAULT NULL,
  `currency` int(11) DEFAULT '0',
  `pmethod` varchar(100) DEFAULT NULL,
  `autologin` varchar(100) DEFAULT NULL,
  `lastlogin` datetime DEFAULT NULL,
  `lastloginip` varchar(100) DEFAULT NULL,
  `stage` varchar(50) DEFAULT NULL,
  `timezone` varchar(50) DEFAULT NULL,
  `isp` varchar(100) DEFAULT NULL,
  `lat` varchar(50) DEFAULT NULL,
  `lon` varchar(50) DEFAULT NULL,
  `gname` varchar(200) DEFAULT NULL,
  `gid` int(11) NOT NULL DEFAULT '0',
  `sid` varchar(200) DEFAULT NULL,
  `role` varchar(200) DEFAULT NULL,
  `country_code` varchar(20) DEFAULT NULL,
  `country_idd` varchar(20) DEFAULT NULL,
  `signed_up_by` varchar(100) DEFAULT NULL,
  `signed_up_ip` varchar(20) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `ct` varchar(200) DEFAULT NULL,
  `assistant` varchar(200) DEFAULT NULL,
  `asst_phone` varchar(100) DEFAULT NULL,
  `second_email` varchar(100) DEFAULT NULL,
  `second_phone` varchar(100) DEFAULT NULL,
  `taxexempt` varchar(50) DEFAULT NULL,
  `latefeeoveride` varchar(50) DEFAULT NULL,
  `overideduenotices` varchar(50) DEFAULT NULL,
  `separateinvoices` varchar(50) DEFAULT NULL,
  `disableautocc` varchar(50) DEFAULT NULL,
  `billingcid` int(10) NOT NULL DEFAULT '0',
  `securityqid` int(10) NOT NULL DEFAULT '0',
  `securityqans` text,
  `cardtype` varchar(200) DEFAULT NULL,
  `cardlastfour` varchar(20) DEFAULT NULL,
  `cardnum` text,
  `startdate` varchar(50) DEFAULT NULL,
  `expdate` varchar(50) DEFAULT NULL,
  `issuenumber` varchar(200) DEFAULT NULL,
  `bankname` varchar(200) DEFAULT NULL,
  `banktype` varchar(200) DEFAULT NULL,
  `bankcode` varchar(200) DEFAULT NULL,
  `bankacct` varchar(200) DEFAULT NULL,
  `gatewayid` int(10) NOT NULL DEFAULT '0',
  `language` text,
  `pwresetkey` varchar(100) DEFAULT NULL,
  `emailoptout` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `pwresetexpiry` datetime DEFAULT NULL,
  `is_email_verified` int(1) NOT NULL DEFAULT '0',
  `is_phone_veirifed` int(1) NOT NULL DEFAULT '0',
  `photo_id_type` varchar(100) DEFAULT NULL,
  `photo_id` varchar(100) DEFAULT NULL,
  `type` varchar(200) NOT NULL DEFAULT 'Customer',
  `drive` varchar(50) DEFAULT NULL,
  `code` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `crm_customfields`
--

CREATE TABLE `crm_customfields` (
  `id` int(10) NOT NULL,
  `workspace_id` int(11) UNSIGNED NOT NULL,
  `ctype` text,
  `relid` int(10) NOT NULL DEFAULT '0',
  `fieldname` text,
  `fieldtype` text,
  `description` text,
  `fieldoptions` text,
  `regexpr` text,
  `adminonly` text,
  `required` text,
  `showorder` text,
  `showinvoice` text,
  `sorder` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `crm_customfieldsvalues`
--

CREATE TABLE `crm_customfieldsvalues` (
  `id` int(10) NOT NULL,
  `workspace_id` int(11) UNSIGNED NOT NULL,
  `fieldid` int(10) NOT NULL,
  `relid` int(10) NOT NULL,
  `fvalue` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `crm_groups`
--

CREATE TABLE `crm_groups` (
  `id` int(11) NOT NULL,
  `workspace_id` int(11) UNSIGNED NOT NULL,
  `gname` varchar(200) DEFAULT NULL,
  `color` varchar(50) DEFAULT NULL,
  `discount` varchar(50) DEFAULT NULL,
  `parent` varchar(200) DEFAULT NULL,
  `pid` int(10) DEFAULT NULL,
  `exempt` text,
  `description` text,
  `separateinvoices` text,
  `sorder` int(10) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `crm_industries`
--

CREATE TABLE `crm_industries` (
  `id` int(11) NOT NULL,
  `workspace_id` int(11) UNSIGNED NOT NULL,
  `industry` varchar(200) DEFAULT NULL,
  `is_active` int(1) NOT NULL DEFAULT '1',
  `is_default` int(1) NOT NULL DEFAULT '0',
  `sorder` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `crm_industries`
--

INSERT INTO `crm_industries` (`id`, `workspace_id`, `industry`, `is_active`, `is_default`, `sorder`) VALUES
(1, 1, 'Agriculture', 1, 0, 0),
(2, 1, 'Apparel', 1, 0, 0),
(3, 1, 'Banking', 1, 0, 0),
(4, 1, 'Biotechnology', 1, 0, 0),
(5, 1, 'Chemicals', 1, 0, 0),
(6, 1, 'Communications', 1, 0, 0),
(7, 1, 'Construction', 1, 0, 0),
(8, 1, 'Consulting', 1, 0, 0),
(9, 1, 'Education', 1, 0, 0),
(10, 1, 'Electronics', 1, 0, 0),
(11, 1, 'Energy', 1, 0, 0),
(12, 1, 'Engineering', 1, 0, 0),
(13, 1, 'Entertainment', 1, 0, 0),
(14, 1, 'Environmental', 1, 0, 0),
(15, 1, 'Finance', 1, 0, 0),
(16, 1, 'Food & Beverage', 1, 0, 0),
(17, 1, 'Government', 1, 0, 0),
(18, 1, 'Healthcare', 1, 0, 0),
(19, 1, 'Hospitality', 1, 0, 0),
(20, 1, 'Insurance', 1, 0, 0),
(21, 1, 'Machinery', 1, 0, 0),
(22, 1, 'Manufacturing', 1, 0, 0),
(23, 1, 'Media', 1, 0, 0),
(24, 1, 'Not For Profit', 1, 0, 0),
(25, 1, 'Other', 1, 0, 0),
(26, 1, 'Recreation', 1, 0, 0),
(27, 1, 'Retail', 1, 0, 0),
(28, 1, 'Shipping', 1, 0, 0),
(29, 1, 'Technology', 1, 0, 0),
(30, 1, 'Telecommunications', 1, 0, 0),
(31, 1, 'Transportation', 1, 0, 0),
(32, 1, 'Utilities', 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `crm_leads`
--

CREATE TABLE `crm_leads` (
  `id` int(11) NOT NULL,
  `workspace_id` int(11) UNSIGNED NOT NULL,
  `uuid` char(36) DEFAULT NULL,
  `secret` varchar(200) DEFAULT NULL,
  `status` varchar(200) DEFAULT NULL,
  `o` varchar(200) DEFAULT NULL,
  `oid` int(11) NOT NULL DEFAULT '0',
  `salutation` varchar(200) DEFAULT NULL,
  `first_name` varchar(200) DEFAULT NULL,
  `middle_name` varchar(200) DEFAULT NULL,
  `last_name` varchar(200) DEFAULT NULL,
  `suffix` varchar(200) DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  `company` varchar(200) DEFAULT NULL,
  `company_id` int(11) NOT NULL DEFAULT '0',
  `website` varchar(200) DEFAULT NULL,
  `industry` varchar(200) DEFAULT NULL,
  `employees` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `color` varchar(20) DEFAULT NULL,
  `source` varchar(200) DEFAULT NULL,
  `added_from` varchar(200) DEFAULT NULL,
  `mobile` varchar(200) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `street` varchar(200) DEFAULT NULL,
  `city` varchar(200) DEFAULT NULL,
  `state` varchar(200) DEFAULT NULL,
  `zip` varchar(50) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `created_by` varchar(200) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(200) DEFAULT NULL,
  `viewed_at` datetime DEFAULT NULL,
  `cid` int(11) NOT NULL DEFAULT '0',
  `aid` int(11) NOT NULL DEFAULT '0',
  `iid` int(11) NOT NULL DEFAULT '0',
  `rid` int(11) NOT NULL DEFAULT '0',
  `sorder` int(11) NOT NULL DEFAULT '0',
  `assigned` int(11) NOT NULL DEFAULT '0',
  `last_contact` datetime DEFAULT NULL,
  `last_contact_by` varchar(200) DEFAULT NULL,
  `date_converted` datetime DEFAULT NULL,
  `public` int(1) NOT NULL DEFAULT '0',
  `ratings` varchar(50) DEFAULT NULL,
  `flag` int(1) NOT NULL DEFAULT '0',
  `lost` int(1) NOT NULL DEFAULT '0',
  `junk` int(1) NOT NULL DEFAULT '0',
  `trash` int(1) NOT NULL DEFAULT '0',
  `archived` int(1) NOT NULL DEFAULT '0',
  `memo` text,
  `code` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `crm_lead_sources`
--

CREATE TABLE `crm_lead_sources` (
  `id` int(11) NOT NULL,
  `workspace_id` int(11) UNSIGNED NOT NULL,
  `sname` varchar(200) DEFAULT NULL,
  `is_active` int(1) NOT NULL DEFAULT '1',
  `is_default` int(1) NOT NULL DEFAULT '1',
  `sorder` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `crm_lead_sources`
--

INSERT INTO `crm_lead_sources` (`id`, `workspace_id`, `sname`, `is_active`, `is_default`, `sorder`) VALUES
(1, 1, 'Advertisement', 1, 1, 0),
(2, 1, 'Customer Event', 1, 1, 0),
(3, 1, 'Employee Referral', 1, 1, 0),
(4, 1, 'Google AdWords', 1, 1, 0),
(5, 1, 'Other', 1, 1, 0),
(6, 1, 'Partner', 1, 1, 0),
(7, 1, 'Purchased List', 1, 1, 0),
(8, 1, 'Trade Show', 1, 1, 0),
(9, 1, 'Webinar', 1, 1, 0),
(10, 1, 'Website', 1, 1, 0),
(11, 1, 'Facebook', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `crm_lead_status`
--

CREATE TABLE `crm_lead_status` (
  `id` int(11) NOT NULL,
  `workspace_id` int(11) UNSIGNED NOT NULL,
  `sname` varchar(200) DEFAULT NULL,
  `is_active` int(1) NOT NULL DEFAULT '1',
  `is_default` int(1) NOT NULL DEFAULT '0',
  `is_converted` int(1) NOT NULL DEFAULT '0',
  `sorder` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `crm_lead_status`
--

INSERT INTO `crm_lead_status` (`id`, `workspace_id`, `sname`, `is_active`, `is_default`, `is_converted`, `sorder`) VALUES
(1, 1, 'Unqualified', 1, 0, 0, 0),
(2, 1, 'New', 1, 1, 0, 0),
(3, 1, 'Working', 1, 0, 0, 0),
(4, 1, 'Nurturing', 1, 0, 0, 0),
(5, 1, 'Qualified', 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `crm_salutations`
--

CREATE TABLE `crm_salutations` (
  `id` int(11) NOT NULL,
  `workspace_id` int(11) UNSIGNED NOT NULL,
  `sname` varchar(200) DEFAULT NULL,
  `is_active` int(1) NOT NULL DEFAULT '1',
  `is_default` int(1) NOT NULL DEFAULT '0',
  `sorder` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `crm_salutations`
--

INSERT INTO `crm_salutations` (`id`, `workspace_id`, `sname`, `is_active`, `is_default`, `sorder`) VALUES
(1, 1, 'Mr.', 1, 0, 0),
(2, 1, 'Ms.', 1, 0, 0),
(3, 1, 'Mrs.', 1, 0, 0),
(4, 1, 'Dr.', 1, 0, 0),
(5, 1, 'Prof.', 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `expense_types`
--

CREATE TABLE `expense_types` (
  `id` int(11) NOT NULL,
  `workspace_id` int(11) UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sorder` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `ib_assets`
--

CREATE TABLE `ib_assets` (
  `id` int(11) NOT NULL,
  `workspace_id` int(11) UNSIGNED NOT NULL,
  `asset_name` varchar(200) DEFAULT NULL,
  `price` decimal(14,2) NOT NULL DEFAULT '0.00',
  `date_purchased` date DEFAULT NULL,
  `warranty_period` date DEFAULT NULL,
  `image` text,
  `description` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ib_doc_rel`
--

CREATE TABLE `ib_doc_rel` (
  `id` int(11) NOT NULL,
  `workspace_id` int(11) UNSIGNED NOT NULL,
  `rtype` varchar(100) NOT NULL DEFAULT 'contact',
  `rid` int(11) NOT NULL DEFAULT '0',
  `did` int(11) NOT NULL DEFAULT '0',
  `can_download` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ib_invoice_access_log`
--

CREATE TABLE `ib_invoice_access_log` (
  `id` int(11) NOT NULL,
  `workspace_id` int(11) UNSIGNED NOT NULL,
  `lid` int(11) NOT NULL DEFAULT '0',
  `cid` int(11) NOT NULL DEFAULT '0',
  `iid` int(11) NOT NULL DEFAULT '0',
  `company_id` int(11) NOT NULL DEFAULT '0',
  `customer` varchar(200) DEFAULT NULL,
  `ip` varchar(50) DEFAULT NULL,
  `browser` varchar(200) DEFAULT NULL,
  `referer` varchar(200) DEFAULT NULL,
  `city` varchar(200) DEFAULT NULL,
  `postal_code` varchar(50) DEFAULT NULL,
  `country` varchar(200) DEFAULT NULL,
  `country_iso` varchar(20) DEFAULT NULL,
  `viewed_at` varchar(200) DEFAULT NULL,
  `lat` varchar(100) DEFAULT NULL,
  `lon` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ib_kb`
--

CREATE TABLE `ib_kb` (
  `id` int(11) NOT NULL,
  `workspace_id` int(11) UNSIGNED NOT NULL,
  `gid` int(11) DEFAULT NULL,
  `gname` varchar(200) DEFAULT NULL,
  `status` varchar(200) DEFAULT NULL,
  `type` varchar(200) DEFAULT NULL,
  `groups` text,
  `title` text,
  `slug` text,
  `description` text,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `views` int(11) DEFAULT NULL,
  `is_public` int(1) NOT NULL DEFAULT '1',
  `sorder` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ib_kb_groups`
--

CREATE TABLE `ib_kb_groups` (
  `id` int(11) NOT NULL,
  `workspace_id` int(11) UNSIGNED NOT NULL,
  `gname` varchar(200) DEFAULT NULL,
  `description` text,
  `status` varchar(200) DEFAULT NULL,
  `color` varchar(50) DEFAULT NULL,
  `pid` int(11) DEFAULT NULL,
  `sorder` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ib_kb_rel`
--

CREATE TABLE `ib_kb_rel` (
  `id` int(11) NOT NULL,
  `workspace_id` int(11) UNSIGNED NOT NULL,
  `kbid` int(11) DEFAULT NULL,
  `gid` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ib_kb_replies`
--

CREATE TABLE `ib_kb_replies` (
  `id` int(11) NOT NULL,
  `workspace_id` int(11) UNSIGNED NOT NULL,
  `kbid` int(11) DEFAULT NULL,
  `cid` int(11) DEFAULT NULL,
  `pid` int(11) DEFAULT NULL,
  `status` varchar(200) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `phone` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `website` varchar(200) DEFAULT NULL,
  `ip` varchar(100) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `reply` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `item_categories`
--

CREATE TABLE `item_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `workspace_id` int(11) UNSIGNED NOT NULL,
  `parent_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `workspace_id` int(11) UNSIGNED NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `currency_id` int(11) DEFAULT NULL,
  `tax_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `item_name` varchar(200) DEFAULT NULL,
  `tax_name` varchar(200) DEFAULT NULL,
  `currency_symbol` varchar(20) DEFAULT NULL,
  `quantity` varchar(20) DEFAULT NULL,
  `unit_price` decimal(16,2) DEFAULT NULL,
  `tax_rate` decimal(16,2) DEFAULT NULL,
  `total` decimal(16,2) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `id` int(10) UNSIGNED NOT NULL,
  `workspace_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `api_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `modules` text COLLATE utf8mb4_unicode_ci,
  `billing_period` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(16,8) NOT NULL,
  `is_quantity_editable` tinyint(4) NOT NULL DEFAULT '0',
  `term_length` int(10) UNSIGNED NOT NULL,
  `auto_renew` tinyint(4) NOT NULL DEFAULT '1',
  `trial_length` int(10) UNSIGNED NOT NULL,
  `setup_fee` decimal(16,8) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `relations`
--

CREATE TABLE `relations` (
  `id` int(10) UNSIGNED NOT NULL,
  `workspace_id` int(11) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `source_id` int(11) NOT NULL,
  `target_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sys_accounts`
--

CREATE TABLE `sys_accounts` (
  `id` int(11) NOT NULL,
  `workspace_id` int(11) UNSIGNED NOT NULL,
  `account` varchar(100) NOT NULL,
  `description` varchar(200) DEFAULT NULL,
  `balance` decimal(18,2) NOT NULL DEFAULT '0.00',
  `bank_name` varchar(200) DEFAULT NULL,
  `account_number` varchar(200) DEFAULT NULL,
  `currency` varchar(20) DEFAULT NULL,
  `branch` varchar(200) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `contact_person` varchar(200) DEFAULT NULL,
  `contact_phone` varchar(100) DEFAULT NULL,
  `website` varchar(200) DEFAULT NULL,
  `ib_url` varchar(200) DEFAULT NULL,
  `created` date DEFAULT NULL,
  `notes` text,
  `sorder` int(11) DEFAULT NULL,
  `e` varchar(200) DEFAULT NULL,
  `token` varchar(200) DEFAULT NULL,
  `status` varchar(200) DEFAULT NULL,
  `owner_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sys_activity`
--

CREATE TABLE `sys_activity` (
  `id` int(11) NOT NULL,
  `workspace_id` int(11) UNSIGNED NOT NULL,
  `cid` int(11) NOT NULL DEFAULT '0',
  `msg` text NOT NULL,
  `icon` varchar(100) NOT NULL DEFAULT '',
  `stime` varchar(50) NOT NULL,
  `sdate` date NOT NULL,
  `o` int(11) NOT NULL DEFAULT '0',
  `oname` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sys_api`
--

CREATE TABLE `sys_api` (
  `id` int(11) NOT NULL,
  `workspace_id` int(11) UNSIGNED NOT NULL,
  `label` text,
  `ip` text,
  `apikey` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sys_appconfig`
--

CREATE TABLE `sys_appconfig` (
  `id` int(11) NOT NULL,
  `workspace_id` int(11) UNSIGNED NOT NULL,
  `setting` varchar(200) NOT NULL DEFAULT '',
  `value` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sys_appconfig`
--

INSERT INTO `sys_appconfig` (`id`, `workspace_id`, `setting`, `value`) VALUES
(1, 1, 'CompanyName', 'CloudOnex LLC.'),
(29, 1, 'theme', 'default'),
(37, 1, 'currency_code', '$'),
(56, 1, 'language', 'en'),
(57, 1, 'show-logo', '1'),
(58, 1, 'nstyle', 'light_blue'),
(63, 1, 'dec_point', '.'),
(64, 1, 'thousands_sep', ','),
(65, 1, 'timezone', 'America/New_York'),
(66, 1, 'country', 'United States'),
(67, 1, 'country_code', 'US'),
(68, 1, 'df', 'Y-m-d'),
(69, 1, 'caddress', 'CloudOnex <br>1101 Marina Villae Parkway, Suite 201<br>Alameda, California 94501<br>United State'),
(70, 1, 'account_search', '1'),
(71, 1, 'redirect_url', 'dashboard'),
(72, 1, 'rtl', '0'),
(73, 1, 'ckey', '0982995697'),
(74, 1, 'networth_goal', '350000'),
(75, 1, 'sysEmail', 'demo@example.com'),
(76, 1, 'url_rewrite', '0'),
(77, 1, 'build', '293'),
(78, 1, 'animate', '0'),
(79, 1, 'pdf_font', 'dejavusanscondensed'),
(80, 1, 'accounting', '1'),
(81, 1, 'invoicing', '1'),
(82, 1, 'quotes', '1'),
(83, 1, 'client_dashboard', '1'),
(84, 1, 'contact_set_view_mode', 'search'),
(85, 1, 'invoice_terms', ''),
(86, 1, 'console_notify_invoice_created', '0'),
(87, 1, 'i_driver', 'v2'),
(88, 1, 'purchase_key', 'B5VE-SNP4-KB15-1179-7948'),
(89, 1, 'c_cache', ''),
(90, 1, 'mininav', '0'),
(91, 1, 'hide_footer', '1'),
(92, 1, 'design', 'default'),
(93, 1, 'default_landing_page', 'login'),
(94, 1, 'recaptcha', '0'),
(95, 1, 'recaptcha_sitekey', ''),
(96, 1, 'recaptcha_secretkey', ''),
(97, 1, 'home_currency', 'USD'),
(98, 1, 'currency_decimal_digits', 'true'),
(99, 1, 'currency_symbol_position', 'p'),
(100, 1, 'thousand_separator_placement', '3'),
(101, 1, 'dashboard', 'canvas'),
(102, 1, 'header_scripts', ''),
(103, 1, 'footer_scripts', ''),
(104, 1, 'ib_key', 'vLBLfhA6DNi1R2MFHO8IvFWr4Cn9665eHUF+L/sqAKM='),
(105, 1, 'ib_s', 'PNhjeZ0sOFF3JNfzT2mLxvNNKPeh6ltqpE+G5LVSDSvgp/z79Sco7W4tJEoXYIl8'),
(106, 1, 'ib_u_t', '1512841700'),
(107, 1, 'ib_u_a', '0'),
(108, 1, 'momentLocale', 'en'),
(109, 1, 'contentAnimation', 'animated fadeIn'),
(110, 1, 'calendar', '1'),
(111, 1, 'leads', '1'),
(112, 1, 'tasks', '1'),
(113, 1, 'orders', '1'),
(114, 1, 'show_quantity_as', ''),
(115, 1, 'gmap_api_key', ''),
(116, 1, 'license_key', '5FEB-2E39-D4DF-24C0-5DF8-2090-AC98-5962'),
(117, 1, 'local_key', ''),
(118, 1, 'ib_installed_at', '1485170108'),
(119, 1, 'maxmind_installed', '1'),
(120, 1, 'maxmind_db_version', ''),
(121, 1, 'add_fund', '1'),
(122, 1, 'add_fund_minimum_deposit', '100'),
(123, 1, 'add_fund_maximum_deposit', '2500'),
(124, 1, 'add_fund_maximum_balance', '25000'),
(125, 1, 'add_fund_require_active_order', '0'),
(126, 1, 'industry', 'default'),
(127, 1, 'sales_target', '10000'),
(128, 1, 'inventory', '1'),
(129, 1, 'secondary_currency', ''),
(130, 1, 'customer_custom_username', '1'),
(131, 1, 'documents', '1'),
(132, 1, 'projects', '0'),
(133, 1, 'purchase', '1'),
(134, 1, 'suppliers', '1'),
(135, 1, 'support', '1'),
(136, 1, 'hrm', '0'),
(137, 1, 'companies', '1'),
(138, 1, 'plugins', '1'),
(139, 1, 'country_flag_code', 'us'),
(140, 1, 'graph_primary_color', '00a2e5'),
(141, 1, 'graph_secondary_color', 'eb3c00'),
(142, 1, 'expense_type_1', 'Personal'),
(143, 1, 'expense_type_2', 'Business'),
(144, 1, 'edition', 'default'),
(147, 1, 'assets', '1'),
(148, 1, 'kb', '1'),
(149, 1, 'business_id_1', ''),
(150, 1, 'business_id_2', ''),
(151, 1, 'logo_default', 'logo_2105025689.png'),
(152, 1, 'logo_inverse', 'logo_inverse_7627893866.png'),
(153, 1, 'add_fund_client', '0'),
(154, 1, 'order_method', 'create_invoice_later'),
(155, 1, 'purchase_code', ''),
(156, 1, 'invoice_receipt_number', '0'),
(157, 1, 'allow_customer_registration', '1'),
(158, 1, 'fax_field', '0'),
(159, 1, 'show_business_number', '1'),
(160, 1, 'label_business_number', 'Business Number'),
(161, 1, 'sms', '1'),
(162, 1, 'sms_request_method', 'POST'),
(163, 1, 'sms_auth_header', ''),
(164, 1, 'sms_req_url', ''),
(165, 1, 'sms_notify_admin_new_deposit', '0'),
(166, 1, 'sms_notify_customer_signed_up', '0'),
(167, 1, 'sms_notify_customer_invoice_created', '0'),
(168, 1, 'sms_notify_customer_invoice_paid', '0'),
(169, 1, 'sms_notify_customer_payment_received', '0'),
(170, 1, 'sms_api_handler', 'Nexmo'),
(171, 1, 'sms_auth_username', ''),
(172, 1, 'sms_auth_password', ''),
(173, 1, 'sms_sender_name', 'CLX'),
(175, 1, 'sms_http_params', ''),
(176, 1, 'purchase_invoice_payment_status', '0'),
(177, 1, 'quote_confirmation_email', '1'),
(178, 1, 'client_drive', '1'),
(179, 1, 's_version', '7'),
(180, 1, 'latest_file', '4618152936941418.zip'),
(181, 1, 'invoice_show_watermark', '1'),
(183, 1, 'show_country_flag', '0'),
(184, 1, 'drive', '0'),
(185, 1, 'tax_system', 'default'),
(186, 1, 'pos', '1'),
(187, 1, 'password_manager', 'default'),
(188, 1, 'update_manager', '1'),
(189, 1, 'app_credentials', '0'),
(190, 1, 'business_location', ''),
(191, 1, 'hr', '1'),
(192, 1, 'saas_build', '200'),
(193, 1, 'mailgun_api_key', ''),
(194, 1, 'mailgun_domain', ''),
(195, 1, 'sparkpost_api_key', '');

-- --------------------------------------------------------

--
-- Table structure for table `sys_canned_responses`
--

CREATE TABLE `sys_canned_responses` (
  `id` int(11) NOT NULL,
  `workspace_id` int(11) UNSIGNED NOT NULL,
  `title` text,
  `message` text,
  `tags` text,
  `attachments` text,
  `sorder` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sys_cart`
--

CREATE TABLE `sys_cart` (
  `id` int(11) NOT NULL,
  `workspace_id` int(11) UNSIGNED NOT NULL,
  `secret` varchar(100) DEFAULT NULL,
  `items` text,
  `total` decimal(16,2) NOT NULL DEFAULT '0.00',
  `discount` decimal(16,2) NOT NULL DEFAULT '0.00',
  `ip` varchar(100) DEFAULT NULL,
  `fullname` varchar(200) DEFAULT NULL,
  `phone` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `status` varchar(200) DEFAULT NULL,
  `browser` varchar(200) DEFAULT NULL,
  `country` varchar(200) DEFAULT NULL,
  `currency` varchar(200) DEFAULT NULL,
  `language` varchar(200) DEFAULT NULL,
  `coupon` varchar(200) DEFAULT NULL,
  `lat` varchar(50) DEFAULT NULL,
  `lon` varchar(50) DEFAULT NULL,
  `item_count` int(11) NOT NULL DEFAULT '0',
  `cid` int(11) NOT NULL DEFAULT '0',
  `aid` int(11) NOT NULL DEFAULT '0',
  `lid` int(11) NOT NULL DEFAULT '0',
  `currency_id` int(11) NOT NULL DEFAULT '0',
  `company_id` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `expiry` datetime DEFAULT NULL,
  `memo` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sys_cats`
--

CREATE TABLE `sys_cats` (
  `id` int(11) NOT NULL,
  `workspace_id` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `type` enum('Income','Expense') NOT NULL,
  `sorder` int(11) NOT NULL DEFAULT '0',
  `total_amount` decimal(16,4) DEFAULT '0.0000',
  `budget` decimal(16,4) DEFAULT '0.0000',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `total_spend` decimal(16,4) DEFAULT '0.0000',
  `current_month_spend` decimal(16,4) DEFAULT '0.0000',
  `current_year_spend` decimal(16,4) DEFAULT '0.0000'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sys_cats`
--

INSERT INTO `sys_cats` (`id`, `workspace_id`, `name`, `type`, `sorder`, `total_amount`, `budget`, `created_at`, `updated_at`, `total_spend`, `current_month_spend`, `current_year_spend`) VALUES
(14, 1, 'Advertising', 'Expense', 1, '0.0000', '0.0000', NULL, '2018-05-17 07:05:31', '0.0000', '0.0000', '0.0000'),
(15, 1, 'Bank and Credit Card Interest', 'Expense', 23, '0.0000', '0.0000', NULL, '2018-05-17 07:05:31', '0.0000', '0.0000', '0.0000'),
(16, 1, 'Car and Truck', 'Expense', 24, '0.0000', '0.0000', NULL, '2018-05-17 07:05:31', '0.0000', '0.0000', '0.0000'),
(17, 1, 'Commissions and Fees', 'Expense', 25, '0.0000', '0.0000', NULL, '2018-05-17 07:05:31', '0.0000', '0.0000', '0.0000'),
(18, 1, 'Contract Labor', 'Expense', 26, '0.0000', '0.0000', NULL, '2018-05-17 07:05:31', '0.0000', '0.0000', '0.0000'),
(19, 1, 'Contributions', 'Expense', 27, '0.0000', '0.0000', NULL, '2018-05-17 07:05:31', '0.0000', '0.0000', '0.0000'),
(20, 1, 'Cost of Goods Sold', 'Expense', 28, '0.0000', '0.0000', NULL, '2018-05-17 07:05:31', '0.0000', '0.0000', '0.0000'),
(21, 1, 'Credit Card Interest', 'Expense', 29, '0.0000', '0.0000', NULL, '2018-05-17 07:05:31', '0.0000', '0.0000', '0.0000'),
(22, 1, 'Depreciation', 'Expense', 31, '0.0000', '0.0000', NULL, '2018-05-17 07:05:31', '0.0000', '0.0000', '0.0000'),
(23, 1, 'Dividend Payments', 'Expense', 32, '0.0000', '0.0000', NULL, '2018-05-17 07:05:31', '0.0000', '0.0000', '0.0000'),
(24, 1, 'Employee Benefit Programs', 'Expense', 33, '0.0000', '0.0000', NULL, '2018-05-17 07:05:31', '0.0000', '0.0000', '0.0000'),
(25, 1, 'Entertainment', 'Expense', 34, '0.0000', '0.0000', NULL, '2018-05-17 07:05:31', '0.0000', '0.0000', '0.0000'),
(26, 1, 'Gift', 'Expense', 35, '0.0000', '0.0000', NULL, '2018-05-17 07:05:31', '0.0000', '0.0000', '0.0000'),
(27, 1, 'Insurance', 'Expense', 36, '0.0000', '0.0000', NULL, '2018-05-17 07:05:31', '0.0000', '0.0000', '0.0000'),
(28, 1, 'Legal, Accountant &amp; Other Professional Services', 'Expense', 37, '0.0000', '0.0000', NULL, '2018-05-17 07:05:31', '0.0000', '0.0000', '0.0000'),
(29, 1, 'Meals', 'Expense', 38, '0.0000', '0.0000', NULL, '2018-05-17 07:05:31', '0.0000', '0.0000', '0.0000'),
(30, 1, 'Mortgage Interest', 'Expense', 39, '0.0000', '0.0000', NULL, '2018-05-17 07:05:31', '0.0000', '0.0000', '0.0000'),
(31, 1, 'Non-Deductible Expense', 'Expense', 40, '0.0000', '0.0000', NULL, '2018-05-17 07:05:31', '0.0000', '0.0000', '0.0000'),
(33, 1, 'Other Business Property Leasing', 'Expense', 22, '0.0000', '0.0000', NULL, '2018-05-17 07:05:31', '0.0000', '0.0000', '0.0000'),
(34, 1, 'Owner Draws', 'Expense', 21, '0.0000', '0.0000', NULL, '2018-05-17 07:05:31', '0.0000', '0.0000', '0.0000'),
(35, 1, 'Payroll Taxes', 'Expense', 8, '0.0000', '0.0000', NULL, '2018-05-17 07:05:31', '0.0000', '0.0000', '0.0000'),
(37, 1, 'Phone', 'Expense', 9, '0.0000', '0.0000', NULL, '2018-05-17 07:05:31', '0.0000', '0.0000', '0.0000'),
(38, 1, 'Postage', 'Expense', 10, '0.0000', '0.0000', NULL, '2018-05-17 07:05:31', '0.0000', '0.0000', '0.0000'),
(39, 1, 'Rent', 'Expense', 12, '0.0000', '0.0000', NULL, '2018-05-17 07:05:31', '0.0000', '0.0000', '0.0000'),
(40, 1, 'Repairs &amp; Maintenance', 'Expense', 11, '0.0000', '0.0000', NULL, '2018-05-17 07:05:31', '0.0000', '0.0000', '0.0000'),
(41, 1, 'Supplies', 'Expense', 13, '0.0000', '0.0000', NULL, '2018-05-17 07:05:31', '0.0000', '0.0000', '0.0000'),
(42, 1, 'Taxes and Licenses', 'Expense', 14, '0.0000', '0.0000', NULL, '2018-05-17 07:05:31', '0.0000', '0.0000', '0.0000'),
(43, 1, 'Transfer Funds', 'Expense', 15, '0.0000', '0.0000', NULL, '2018-05-17 07:05:31', '0.0000', '0.0000', '0.0000'),
(44, 1, 'Travel', 'Expense', 16, '0.0000', '0.0000', NULL, '2018-05-17 07:05:31', '0.0000', '0.0000', '0.0000'),
(45, 1, 'Utilities', 'Expense', 17, '0.0000', '0.0000', NULL, '2018-05-17 07:05:31', '0.0000', '0.0000', '0.0000'),
(46, 1, 'Vehicle, Machinery &amp; Equipment Rental or Leasing', 'Expense', 18, '0.0000', '0.0000', NULL, '2018-05-17 07:05:31', '0.0000', '0.0000', '0.0000'),
(47, 1, 'Wages', 'Expense', 19, '0.0000', '0.0000', NULL, '2018-05-17 07:05:31', '0.0000', '0.0000', '0.0000'),
(48, 1, 'Regular Income', 'Income', 1, '0.0000', '0.0000', NULL, '2018-05-17 07:05:31', '0.0000', '0.0000', '0.0000'),
(49, 1, 'Owner Contribution', 'Income', 12, '0.0000', '0.0000', NULL, '2018-05-17 07:05:31', '0.0000', '0.0000', '0.0000'),
(50, 1, 'Interest Income', 'Income', 11, '0.0000', '0.0000', NULL, '2018-05-17 07:05:31', '0.0000', '0.0000', '0.0000'),
(51, 1, 'Expense Refund', 'Income', 10, '0.0000', '0.0000', NULL, '2018-05-17 07:05:31', '0.0000', '0.0000', '0.0000'),
(52, 1, 'Other Income', 'Income', 9, '0.0000', '0.0000', NULL, '2018-05-17 07:05:31', '0.0000', '0.0000', '0.0000'),
(53, 1, 'Salary', 'Income', 8, '0.0000', '0.0000', NULL, '2018-05-17 07:05:31', '0.0000', '0.0000', '0.0000'),
(54, 1, 'Equities', 'Income', 7, '0.0000', '0.0000', NULL, '2018-05-17 07:05:31', '0.0000', '0.0000', '0.0000'),
(55, 1, 'Rent &amp; Royalties', 'Income', 6, '0.0000', '0.0000', NULL, '2018-05-17 07:05:31', '0.0000', '0.0000', '0.0000'),
(56, 1, 'Home equity', 'Income', 5, '0.0000', '0.0000', NULL, '2018-05-17 07:05:31', '0.0000', '0.0000', '0.0000'),
(57, 1, 'Part Time Work', 'Income', 3, '0.0000', '0.0000', NULL, '2018-05-17 07:05:31', '0.0000', '0.0000', '0.0000'),
(58, 1, 'Account Transfer', 'Income', 4, '0.0000', '0.0000', NULL, '2018-05-17 07:05:31', '0.0000', '0.0000', '0.0000'),
(60, 1, 'Health Care', 'Expense', 20, '0.0000', '0.0000', NULL, '2018-05-17 07:05:31', '0.0000', '0.0000', '0.0000'),
(63, 1, 'Loans', 'Expense', 30, '0.0000', '0.0000', NULL, '2018-05-17 07:05:31', '0.0000', '0.0000', '0.0000'),
(64, 1, 'Selling Software', 'Income', 2, '0.0000', '0.0000', NULL, '2018-05-17 07:05:31', '0.0000', '0.0000', '0.0000'),
(65, 1, 'Software Customization', 'Income', 13, '0.0000', '0.0000', NULL, '2018-05-17 07:05:31', '0.0000', '0.0000', '0.0000'),
(67, 1, 'Salary', 'Expense', 7, '0.0000', '0.0000', NULL, '2018-05-17 07:05:31', '0.0000', '0.0000', '0.0000'),
(68, 1, 'Paypal', 'Expense', 6, '0.0000', '0.0000', NULL, '2018-05-17 07:05:31', '0.0000', '0.0000', '0.0000'),
(69, 1, 'Office Equipment', 'Expense', 5, '0.0000', '0.0000', NULL, '2018-05-17 07:05:31', '0.0000', '0.0000', '0.0000'),
(70, 1, 'Staff Entertaining', 'Expense', 3, '0.0000', '0.0000', NULL, '2018-05-17 07:05:31', '0.0000', '0.0000', '0.0000'),
(71, 1, 'Uncategorized', 'Income', 0, '0.0000', '0.0000', '2018-04-05 04:59:50', '2018-05-17 07:05:31', '0.0000', '0.0000', '0.0000');

-- --------------------------------------------------------

--
-- Table structure for table `sys_companies`
--

CREATE TABLE `sys_companies` (
  `id` int(11) NOT NULL,
  `workspace_id` int(11) UNSIGNED NOT NULL,
  `uuid` char(36) DEFAULT NULL,
  `company_name` varchar(200) DEFAULT NULL,
  `business_number` varchar(200) DEFAULT NULL,
  `url` varchar(200) DEFAULT NULL,
  `logo_url` varchar(200) DEFAULT NULL,
  `logo_path` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `phone` varchar(200) DEFAULT NULL,
  `emails` text,
  `phones` text,
  `tags` text,
  `description` text,
  `notes` text,
  `address1` varchar(200) DEFAULT NULL,
  `address2` varchar(200) DEFAULT NULL,
  `city` varchar(200) DEFAULT NULL,
  `state` varchar(200) DEFAULT NULL,
  `zip` varchar(50) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `source` varchar(200) DEFAULT NULL,
  `added_from` varchar(200) DEFAULT NULL,
  `o` varchar(200) DEFAULT NULL,
  `cid` int(11) NOT NULL DEFAULT '0',
  `aid` int(11) NOT NULL DEFAULT '0',
  `pid` int(11) NOT NULL DEFAULT '0',
  `oid` int(11) NOT NULL DEFAULT '0',
  `rid` int(11) NOT NULL DEFAULT '0',
  `assigned` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(200) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` varchar(200) DEFAULT NULL,
  `last_contact` datetime DEFAULT NULL,
  `last_contact_by` varchar(200) DEFAULT NULL,
  `ratings` varchar(50) DEFAULT NULL,
  `trash` int(1) NOT NULL DEFAULT '0',
  `archived` int(1) NOT NULL DEFAULT '0',
  `c1` text,
  `c2` text,
  `c3` text,
  `c4` text,
  `c5` text,
  `code` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sys_currencies`
--

CREATE TABLE `sys_currencies` (
  `id` int(11) NOT NULL,
  `workspace_id` int(11) UNSIGNED NOT NULL,
  `cname` varchar(100) DEFAULT NULL,
  `iso_code` varchar(10) DEFAULT NULL,
  `symbol` varchar(20) DEFAULT NULL,
  `rate` decimal(16,8) NOT NULL DEFAULT '1.00000000',
  `prefix` varchar(20) DEFAULT NULL,
  `suffix` varchar(20) DEFAULT NULL,
  `format` varchar(100) DEFAULT NULL,
  `decimal_separator` varchar(10) DEFAULT NULL,
  `thousand_separator` varchar(10) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(200) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(200) DEFAULT NULL,
  `available_in` text,
  `isdefault` int(1) NOT NULL DEFAULT '0',
  `trash` int(1) NOT NULL DEFAULT '0',
  `archived` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sys_currencies`
--

INSERT INTO `sys_currencies` (`id`, `workspace_id`, `cname`, `iso_code`, `symbol`, `rate`, `prefix`, `suffix`, `format`, `decimal_separator`, `thousand_separator`, `created_at`, `created_by`, `updated_at`, `updated_by`, `available_in`, `isdefault`, `trash`, `archived`) VALUES
(1, 1, 'USD', 'USD', '$', '1.00000000', NULL, NULL, NULL, NULL, NULL, '2018-05-17 07:05:31', NULL, '2018-05-17 07:05:31', NULL, NULL, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sys_documents`
--

CREATE TABLE `sys_documents` (
  `id` int(11) NOT NULL,
  `workspace_id` int(11) UNSIGNED NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `file_o_name` varchar(200) DEFAULT NULL,
  `file_r_name` varchar(200) DEFAULT NULL,
  `file_mime_type` varchar(200) DEFAULT NULL,
  `file_path` varchar(200) DEFAULT NULL,
  `file_dl_token` varchar(200) DEFAULT NULL,
  `file_owner` int(11) NOT NULL DEFAULT '0',
  `version` varchar(100) DEFAULT NULL,
  `link` varchar(100) DEFAULT NULL,
  `sha1` varchar(40) DEFAULT NULL,
  `md5` varchar(32) DEFAULT NULL,
  `cid` int(11) NOT NULL DEFAULT '0',
  `gid` int(11) NOT NULL DEFAULT '0',
  `company_id` int(11) NOT NULL DEFAULT '0',
  `aid` int(11) NOT NULL DEFAULT '0',
  `contacts` text,
  `deals` text,
  `leads` text,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(200) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(200) DEFAULT NULL,
  `customer_can_download` int(1) NOT NULL DEFAULT '0',
  `trash` int(1) NOT NULL DEFAULT '0',
  `archived` int(1) NOT NULL DEFAULT '0',
  `is_global` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sys_emailconfig`
--

CREATE TABLE `sys_emailconfig` (
  `id` int(11) NOT NULL,
  `workspace_id` int(11) UNSIGNED NOT NULL,
  `method` varchar(50) NOT NULL,
  `host` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `apikey` varchar(200) NOT NULL,
  `port` varchar(10) NOT NULL,
  `secure` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sys_emailconfig`
--

INSERT INTO `sys_emailconfig` (`id`, `workspace_id`, `method`, `host`, `username`, `password`, `apikey`, `port`, `secure`) VALUES
(1, 1, 'phpmail', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `sys_email_logs`
--

CREATE TABLE `sys_email_logs` (
  `id` int(10) NOT NULL,
  `workspace_id` int(11) UNSIGNED NOT NULL,
  `userid` int(10) NOT NULL,
  `sender` varchar(200) NOT NULL,
  `email` text NOT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL,
  `date` datetime DEFAULT NULL,
  `iid` int(11) NOT NULL DEFAULT '0',
  `rel_type` varchar(100) DEFAULT NULL,
  `rel_id` int(11) NOT NULL DEFAULT '0',
  `purchase_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sys_email_templates`
--

CREATE TABLE `sys_email_templates` (
  `id` int(11) NOT NULL,
  `workspace_id` int(11) UNSIGNED NOT NULL,
  `tplname` varchar(128) NOT NULL,
  `language_id` int(11) NOT NULL DEFAULT '1',
  `subject` text NOT NULL,
  `message` text NOT NULL,
  `send` varchar(50) DEFAULT 'Active',
  `core` enum('Yes','No') DEFAULT 'Yes',
  `hidden` tinyint(1) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sys_email_templates`
--

INSERT INTO `sys_email_templates` (`id`, `workspace_id`, `tplname`, `language_id`, `subject`, `message`, `send`, `core`, `hidden`, `created_at`, `updated_at`) VALUES
(3, 1, 'Invoice:Invoice Created', 1, '{{business_name}} Invoice', '<div style=\"line-height:1.6;color:#222;text-align:left;width:550px;font-size:10pt;margin:0px 10px;font-family:verdana,\'droid sans\',\'lucida sans\',sans-serif;padding:14px;border:3px solid #d8d8d8;border-top:3px solid #007bc3\"><div style=\"padding:5px;font-size:11pt;font-weight:bold\">   Greetings,</div>	<div style=\"padding:5px\">		This email serves as your official invoice from <strong>{{business_name}}. </strong>	</div><div style=\"padding:10px 5px\">    Invoice URL: <a href=\"{{invoice_url}}\" target=\"_blank\">{{invoice_url}}</a><a target=\"_blank\" style=\"color:#1da9c0;font-weight:bold;padding:3px;text-decoration:none\" href=\"{{app_url}}\"></a><br>Invoice ID: {{invoice_id}}<br>Invoice Amount: {{invoice_amount}}<br>Due Date: {{invoice_due_date}}</div><div style=\"padding:5px\"><span style=\"font-size: 13.3333330154419px; line-height: 21.3333320617676px;\">If you have any questions or need assistance, please don\'t hesitate to contact us.</span><br></div><div style=\"padding:0px 5px\">	<div>Best Regards,<br>{{business_name}} Team</div></div></div>', 'Yes', 'Yes', 0, NULL, NULL),
(7, 1, 'Admin:Password Change Request', 1, '{{business_name}} password change request', '<div style=\"line-height:1.6;color:#222;text-align:left;width:550px;font-size:10pt;margin:0px 10px;font-family:verdana,\'droid sans\',\'lucida sans\',sans-serif;padding:14px;border:3px solid #d8d8d8;border-top:3px solid #007bc3\"><div style=\"padding:5px;font-size:11pt;font-weight:bold\">   Hi {{name}},</div>	<div style=\"padding:5px\">		This is to confirm that we have received a Forgot Password request for your Account Username - {{username}} <br>From the IP Address - {{ip_address}}	</div>	<div style=\"padding:5px\">		Click this linke to reset your password- <br><a target=\"_blank\" style=\"color:#1da9c0;font-weight:bold;padding:3px;text-decoration:none\" href=\"{{password_reset_link}}\">{{password_reset_link}}</a>	</div><div style=\"padding:5px\">Please note: until your password has been changed, your current password will remain valid. The Forgot Password Link will be available for a limited time only.</div><div style=\"padding:0px 5px\">	<div>Best Regards,<br>{{business_name}} Team</div></div></div>', 'Yes', 'Yes', 0, NULL, NULL),
(10, 1, 'Admin:New Password', 1, '{{business_name}} New Password for Admin', '<div style=\"line-height:1.6;color:#222;text-align:left;width:550px;font-size:10pt;margin:0px 10px;font-family:verdana,\'droid sans\',\'lucida sans\',sans-serif;padding:14px;border:3px solid #d8d8d8;border-top:3px solid #007bc3\">\n\n<div style=\"padding:5px;font-size:11pt;font-weight:bold\">\n   Hello {{name}}\n</div>\n\n\n	<div style=\"padding:5px\">\n		Here is your new password for <strong>{{business_name}}. </strong>\n	</div>\n\n	\n<div style=\"padding:10px 5px\">\n    Log in URL: <a target=\"_blank\" style=\"color:#1da9c0;font-weight:bold;padding:3px;text-decoration:none\" href=\"{{login_url}}\">{{login_url}}</a><br>Username: {{username}}<br>Password: {{password}}</div>\n\n<div style=\"padding:5px\">For security reason, Please change your password after login. </div>\n\n<div style=\"padding:0px 5px\">\n	<div>Best Regards,<br>{{business_name}} Team</div>\n\n</div>\n\n</div>', 'Yes', 'Yes', 0, NULL, NULL),
(12, 1, 'Invoice:Invoice Payment Reminder', 1, '{{business_name}} Invoice Payment Reminder', '<div style=\"line-height:1.6;color:#222;text-align:left;width:550px;font-size:10pt;margin:0px 10px;font-family:verdana,\'droid sans\',\'lucida sans\',sans-serif;padding:14px;border:3px solid #d8d8d8;border-top:3px solid #007bc3\"><div style=\"padding:5px;font-size:11pt;font-weight:bold\">   Greetings,</div>	<div style=\"padding:5px\">		This is a billing reminder that your invoice no. {{invoice_id}} which was generated on {{invoice_date}} is due on {{invoice_due_date}}. 	</div><div style=\"padding:10px 5px\">    Invoice URL: <a href=\"{{invoice_url}}\" target=\"_blank\">{{invoice_url}}</a><a target=\"_blank\" style=\"color:#1da9c0;font-weight:bold;padding:3px;text-decoration:none\" href=\"{{app_url}}\"></a><br>Invoice ID: {{invoice_id}}<br>Invoice Amount: {{invoice_amount}}<br>Due Date: {{invoice_due_date}}</div><div style=\"padding:5px\"><span style=\"font-size: 13.3333330154419px; line-height: 21.3333320617676px;\">If you have any questions or need assistance, please don\'t hesitate to contact us.</span><br></div><div style=\"padding:0px 5px\">	<div>Best Regards,<br>{{business_name}} Team</div></div></div>', 'Yes', 'Yes', 0, NULL, NULL),
(13, 1, 'Invoice:Invoice Overdue Notice', 1, '{{business_name}} Invoice Overdue Notice', '<div style=\"line-height:1.6;color:#222;text-align:left;width:550px;font-size:10pt;margin:0px 10px;font-family:verdana,\'droid sans\',\'lucida sans\',sans-serif;padding:14px;border:3px solid #d8d8d8;border-top:3px solid #007bc3\"><div style=\"padding:5px;font-size:11pt;font-weight:bold\">   Greetings,</div>	<div style=\"padding:5px\">		This is the notice that your invoice no. {{invoice_id}} which was generated on {{invoice_date}} is now overdue.	</div>	<div style=\"padding:10px 5px\">    Invoice URL: <a href=\"{{invoice_url}}\" target=\"_blank\">{{invoice_url}}</a><a target=\"_blank\" style=\"color:#1da9c0;font-weight:bold;padding:3px;text-decoration:none\" href=\"{{app_url}}\"></a><br>Invoice ID: {{invoice_id}}<br>Invoice Amount: {{invoice_amount}}<br>Due Date: {{invoice_due_date}}</div><div style=\"padding:5px\"><span style=\"font-size: 13.3333330154419px; line-height: 21.3333320617676px;\">If you have any questions or need assistance, please don\'t hesitate to contact us.</span><br></div><div style=\"padding:0px 5px\">	<div>Best Regards,<br>{{business_name}} Team</div></div></div>', 'Yes', 'Yes', 0, NULL, NULL),
(14, 1, 'Invoice:Invoice Payment Confirmation', 1, '{{business_name}} Invoice Payment Confirmation', '<div style=\"line-height:1.6;color:#222;text-align:left;width:550px;font-size:10pt;margin:0px 10px;font-family:verdana,\'droid sans\',\'lucida sans\',sans-serif;padding:14px;border:3px solid #d8d8d8;border-top:3px solid #007bc3\">\n\n<div style=\"padding:5px;font-size:11pt;font-weight:bold\">\n   Greetings,\n</div>\n\n\n\n	<div style=\"padding:5px\">\n		This is a payment receipt for Invoice {{invoice_id}} sent on {{invoice_date}}.\n	</div>\n\n\n	<div style=\"padding:5px\">\n		Login to your client Portal to view this invoice.\n	</div>\n\n\n<div style=\"padding:10px 5px\">\n    Invoice URL: <a href=\"{{invoice_url}}\" target=\"_blank\">{{invoice_url}}</a><a target=\"_blank\" style=\"color:#1da9c0;font-weight:bold;padding:3px;text-decoration:none\" href=\"{{app_url}}\"></a><br>Invoice ID: {{invoice_id}}<br>Invoice Amount: {{invoice_amount}}<br>Due Date: {{invoice_due_date}}</div>\n\n\n<div style=\"padding:5px\"><span style=\"font-size: 13.3333330154419px; line-height: 21.3333320617676px;\">If you have any questions or need assistance, please don\'t hesitate to contact us.</span><br></div>\n\n\n<div style=\"padding:0px 5px\">\n	<div>Best Regards,<br>{{business_name}} Team</div>\n\n\n</div>\n\n\n</div>', 'Yes', 'Yes', 0, NULL, NULL),
(15, 1, 'Invoice:Invoice Refund Confirmation', 1, '{{business_name}} Invoice Refund Confirmation', '<div style=\"line-height:1.6;color:#222;text-align:left;width:550px;font-size:10pt;margin:0px 10px;font-family:verdana,\'droid sans\',\'lucida sans\',sans-serif;padding:14px;border:3px solid #d8d8d8;border-top:3px solid #007bc3\"><div style=\"padding:5px;font-size:11pt;font-weight:bold\">   Greetings,</div>	<div style=\"padding:5px\">		This is confirmation that a refund has been processed for Invoice {{invoice_id}} sent on {{invoice_date}}.	</div><div style=\"padding:10px 5px\">    Invoice URL: <a href=\"{{invoice_url}}\" target=\"_blank\">{{invoice_url}}</a><a target=\"_blank\" style=\"color:#1da9c0;font-weight:bold;padding:3px;text-decoration:none\" href=\"{{app_url}}\"></a><br>Invoice ID: {{invoice_id}}<br>Invoice Amount: {{invoice_amount}}<br>Due Date: {{invoice_due_date}}</div><div style=\"padding:5px\"><span style=\"font-size: 13.3333330154419px; line-height: 21.3333320617676px;\">If you have any questions or need assistance, please don\'t hesitate to contact us.</span><br></div><div style=\"padding:0px 5px\">	<div>Best Regards,<br>{{business_name}} Team</div></div></div>', 'Yes', 'Yes', 0, NULL, NULL),
(16, 1, 'Quote:Quote Created', 1, '{{quote_subject}}', '<div style=\"line-height:1.6;color:#222;text-align:left;width:550px;font-size:10pt;margin:0px 10px;font-family:verdana,sans-serif;padding:14px;border:3px solid #d8d8d8;border-top:3px solid #007bc3\"><div style=\"padding:5px;font-size:11pt;font-weight:bold\">   Greetings,</div>	<div style=\"padding:5px\">		Dear {{contact_name}},&nbsp;<br> Here is the quote you requested for.  The quote is valid until {{valid_until}}.	</div><div style=\"padding:10px 5px\">    Quote Unique URL: <a href=\"{{quote_url}}\" target=\"_blank\">{{quote_url}}</a><br></div><div style=\"padding:5px\"><span style=\"font-size: 13.3333330154419px; line-height: 21.3333320617676px;\">You may view the quote at any time and simply reply to this email with any further questions or requirement.</span><br></div><div style=\"padding:0px 5px\">	<div>Best Regards,<br>{{business_name}} Team</div></div></div>', 'Yes', 'Yes', 0, NULL, NULL),
(17, 1, 'Client:Client Signup Email', 1, 'Your {{business_name}} Login Info', '<p>Dear {{client_name}},</p>\n<p>Welcome to {{business_name}}.</p>\n<p>You can track your billing, profile, transactions from this portal.</p>\n<p>Your login information is as follows:</p>\n<p>---------------------------------------------------------------------------------------</p>\n<p>Login URL: {{client_login_url}} <br />Email Address: {{client_email}}<br /> Password: Your chosen password.</p>\n<p>----------------------------------------------------------------------------------------</p>\n<p>We very much appreciate you for choosing us.</p>\n<p>{{business_name}} Team</p>', 'Yes', 'Yes', 0, NULL, NULL),
(18, 1, 'Tickets:Client Ticket Created', 1, '{{subject}}', '<p>{{client_name}},</p>\n<p>Thank you for contacting our support team. A support ticket has now been opened for your request. You will be notified when a response is made by email. Your ticket ID is {{ticket_id}} and a copy of your original message is included below.</p>\n<p>\nSubject: {ticket_subject}\n<br /> Message: <br />\n{{message}}\n<br /> Priority: {{ticket_priority}}\n<br /> Status: {{ticket_status}}\n</p>\n<p>You can view the ticket at any time at {{ticket_link}}</p>\n', 'Yes', 'Yes', 0, NULL, NULL),
(19, 1, 'Tickets:Admin Ticket Created', 1, '{{subject}}', '<p>{{admin_view_link}}</p> {{message}}', 'Yes', 'Yes', 0, NULL, NULL),
(20, 1, 'Tickets:Client Response', 1, '{{subject}}', '<p>{{ticket_message}}</p>\n<p>----------------------------------------------<br /> Ticket ID: #{{ticket_id}}<br /> Subject: {{ticket_subject}}<br /> Status: {{ticket_status}}<br /> Ticket URL: {{ticket_link}}<br /> ----------------------------------------------</p>', 'No', 'Yes', 0, NULL, NULL),
(21, 1, 'Tickets:Admin Response', 1, '{{subject}}', '<p>{{ticket_message}}</p>\n<p>----------------------------------------------<br /> Ticket ID: #{{ticket_id}}<br /> Subject: {{ticket_subject}}<br /> Status: {{ticket_status}}<br /> Ticket URL: {{ticket_link}}<br /> ----------------------------------------------</p>', 'No', 'Yes', 0, NULL, NULL),
(23, 1, 'Purchase Invoice:Invoice Created', 1, '{{business_name}} Invoice', '<div style=\"line-height: 1.6; color: #222; text-align: left; width: 550px; font-size: 10pt; margin: 0px 10px; font-family: verdana,\'droid sans\',\'lucida sans\',sans-serif; padding: 14px; border: 3px solid #d8d8d8; border-top: 3px solid #007bc3;\">\n<div style=\"padding: 5px; font-size: 11pt; font-weight: bold;\">Greetings,</div>\n<div style=\"padding: 5px;\">This email serves as your official invoice from <strong>{{business_name}}. </strong></div>\n<div style=\"padding: 10px 5px;\">Invoice URL: {{invoice_url}}<br />Invoice ID: {{invoice_id}}<br />Invoice Amount: {{invoice_amount}}</div>\n<div style=\"padding: 5px;\"><span style=\"font-size: 13.3333330154419px; line-height: 21.3333320617676px;\">If you have any questions or need assistance, please don\'t hesitate to contact us.</span></div>\n<div style=\"padding: 0px 5px;\">\n<div>Best Regards,<br />{{business_name}} Team</div>\n</div>\n</div>', 'Yes', 'Yes', 0, NULL, NULL),
(24, 1, 'Quote:Quote Cancelled', 1, '{{business_name}} Quote', '<div style=\"line-height: 1.6; color: #222; text-align: left; width: 550px; font-size: 10pt; margin: 0px 10px; font-family: verdana,sans-serif; padding: 14px; border: 3px solid #d8d8d8; border-top: 3px solid #007bc3;\">\n<div style=\"padding: 5px; font-size: 11pt; font-weight: bold;\">Greetings,</div>\n<div style=\"padding: 5px;\">Dear {{contact_name}},&nbsp;<br />We are sorry to see you go. If you chnage your mind, you can Accept it again from following url. The quote is valid until {{valid_until}}.</div>\n<div style=\"padding: 10px 5px;\">Quote Unique URL: <a href=\"http://stackb.dev/{{quote_url}}\" target=\"_blank\" rel=\"noopener noreferrer\">{{quote_url}}</a></div>\n<div style=\"padding: 5px;\"><span style=\"font-size: 13.3333330154419px; line-height: 21.3333320617676px;\">You may view the quote at any time and simply reply to this email with any further questions or requirement.</span></div>\n<div style=\"padding: 0px 5px;\">\n<div>Best Regards,<br />{{business_name}} Team</div>\n</div>\n</div>', 'Yes', 'Yes', 0, NULL, NULL),
(25, 1, 'Quote:Quote Accepted', 1, '{{business_name}} Quote', '<div style=\"line-height: 1.6; color: #222; text-align: left; width: 550px; font-size: 10pt; margin: 0px 10px; font-family: verdana,sans-serif; padding: 14px; border: 3px solid #d8d8d8; border-top: 3px solid #007bc3;\">\n<div style=\"padding: 5px; font-size: 11pt; font-weight: bold;\">Greetings,</div>\n<div style=\"padding: 5px;\">Dear {{contact_name}},&nbsp;<br />Thank you for accepting the Quote.</div>\n<div style=\"padding: 10px 5px;\">Quote: <a href=\"{{quote_url}}\" target=\"_blank\" rel=\"noopener noreferrer\">{{quote_url}}</a></div>\n<div style=\"padding: 5px;\"><span style=\"font-size: 13.3333330154419px; line-height: 21.3333320617676px;\">You may view the quote at any time and simply reply to this email with any further questions or requirement.</span></div>\n<div style=\"padding: 0px 5px;\">\n<div>Best Regards,<br />{{business_name}} Team</div>\n</div>\n</div>', 'Yes', 'Yes', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sys_events`
--

CREATE TABLE `sys_events` (
  `id` int(11) NOT NULL,
  `workspace_id` int(11) UNSIGNED NOT NULL,
  `title` text,
  `description` text,
  `contacts` text,
  `deals` text,
  `owner` varchar(200) DEFAULT NULL,
  `status` varchar(200) DEFAULT NULL,
  `etype` varchar(200) DEFAULT NULL,
  `priority` varchar(200) DEFAULT NULL,
  `color` varchar(20) DEFAULT NULL,
  `o` varchar(200) DEFAULT NULL,
  `cid` int(11) NOT NULL DEFAULT '0',
  `aid` int(11) NOT NULL DEFAULT '0',
  `iid` int(11) NOT NULL DEFAULT '0',
  `oid` int(11) NOT NULL DEFAULT '0',
  `rid` int(11) NOT NULL DEFAULT '0',
  `company_id` int(11) NOT NULL DEFAULT '0',
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  `allday` int(1) NOT NULL DEFAULT '0',
  `notification` int(1) NOT NULL DEFAULT '0',
  `trash` int(1) NOT NULL DEFAULT '0',
  `archived` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sys_invoiceitems`
--

CREATE TABLE `sys_invoiceitems` (
  `id` int(10) NOT NULL,
  `workspace_id` int(11) UNSIGNED NOT NULL,
  `invoiceid` int(10) NOT NULL DEFAULT '0',
  `userid` int(10) NOT NULL,
  `type` text NOT NULL,
  `relid` int(10) NOT NULL,
  `itemcode` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `qty` varchar(20) NOT NULL DEFAULT '1',
  `amount` decimal(14,2) NOT NULL DEFAULT '0.00',
  `taxed` int(1) NOT NULL,
  `tax_name` varchar(200) DEFAULT NULL,
  `tax_rate` decimal(16,3) DEFAULT NULL,
  `taxamount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `total` decimal(14,2) NOT NULL DEFAULT '0.00',
  `duedate` date DEFAULT NULL,
  `paymentmethod` text NOT NULL,
  `notes` text NOT NULL,
  `business_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sys_invoices`
--

CREATE TABLE `sys_invoices` (
  `id` int(10) NOT NULL,
  `workspace_id` int(11) UNSIGNED NOT NULL,
  `uuid` char(36) DEFAULT NULL,
  `userid` int(10) NOT NULL,
  `account` varchar(200) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `cn` varchar(100) NOT NULL DEFAULT '',
  `invoicenum` text NOT NULL,
  `date` date DEFAULT NULL,
  `duedate` date DEFAULT NULL,
  `datepaid` datetime DEFAULT NULL,
  `subtotal` decimal(18,2) NOT NULL,
  `discount_type` varchar(1) NOT NULL DEFAULT 'f',
  `discount_value` decimal(14,2) NOT NULL DEFAULT '0.00',
  `discount` decimal(14,2) NOT NULL DEFAULT '0.00',
  `credit` decimal(10,2) NOT NULL DEFAULT '0.00',
  `taxname` varchar(100) NOT NULL,
  `tax` decimal(10,2) NOT NULL,
  `tax2` decimal(10,2) NOT NULL,
  `total` decimal(18,2) NOT NULL DEFAULT '0.00',
  `taxrate` decimal(10,2) NOT NULL,
  `taxrate2` decimal(10,2) NOT NULL,
  `status` text NOT NULL,
  `paymentmethod` text NOT NULL,
  `notes` text NOT NULL,
  `vtoken` varchar(20) NOT NULL,
  `ptoken` varchar(20) NOT NULL,
  `r` varchar(100) NOT NULL DEFAULT '0',
  `nd` date DEFAULT NULL,
  `eid` int(10) NOT NULL DEFAULT '0',
  `ename` varchar(200) NOT NULL DEFAULT '',
  `vid` int(11) NOT NULL DEFAULT '0',
  `quote_id` int(11) NOT NULL DEFAULT '0',
  `ticket_id` int(11) DEFAULT '0',
  `currency` int(11) NOT NULL DEFAULT '0',
  `currency_symbol` varchar(10) DEFAULT NULL,
  `currency_prefix` varchar(10) DEFAULT NULL,
  `currency_suffix` varchar(10) DEFAULT NULL,
  `currency_rate` decimal(11,4) NOT NULL DEFAULT '1.0000',
  `recurring` tinyint(1) NOT NULL DEFAULT '0',
  `recurring_ends` date DEFAULT NULL,
  `last_recurring_date` date DEFAULT NULL,
  `source` varchar(200) DEFAULT NULL,
  `sale_agent` int(11) NOT NULL DEFAULT '0',
  `last_overdue_reminder` date DEFAULT NULL,
  `allowed_payment_methods` text,
  `billing_street` varchar(200) DEFAULT NULL,
  `billing_city` varchar(100) DEFAULT NULL,
  `billing_state` varchar(100) DEFAULT NULL,
  `billing_zip` varchar(50) DEFAULT NULL,
  `billing_country` varchar(100) DEFAULT NULL,
  `shipping_street` varchar(200) DEFAULT NULL,
  `shipping_city` varchar(100) DEFAULT NULL,
  `shipping_state` varchar(100) DEFAULT NULL,
  `shipping_zip` varchar(100) DEFAULT NULL,
  `shipping_country` varchar(100) DEFAULT NULL,
  `q_hide` tinyint(1) NOT NULL DEFAULT '0',
  `show_quantity_as` varchar(100) DEFAULT NULL,
  `pid` int(11) NOT NULL DEFAULT '0',
  `is_credit_invoice` int(1) NOT NULL DEFAULT '0',
  `aid` int(11) NOT NULL DEFAULT '0',
  `aname` varchar(200) DEFAULT NULL,
  `receipt_number` varchar(200) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `code` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sys_items`
--

CREATE TABLE `sys_items` (
  `id` int(11) NOT NULL,
  `workspace_id` int(11) UNSIGNED NOT NULL,
  `name` mediumtext NOT NULL,
  `unit` varchar(100) NOT NULL DEFAULT '',
  `sales_price` decimal(16,2) NOT NULL DEFAULT '0.00',
  `inventory` decimal(16,4) NOT NULL DEFAULT '0.0000',
  `weight` decimal(16,4) NOT NULL DEFAULT '0.0000',
  `width` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `length` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `height` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `sku` varchar(50) DEFAULT NULL,
  `upc` varchar(50) DEFAULT NULL,
  `ean` varchar(50) DEFAULT NULL,
  `mpn` varchar(50) DEFAULT NULL,
  `isbn` varchar(50) DEFAULT NULL,
  `sid` int(11) NOT NULL DEFAULT '0',
  `supplier` varchar(200) DEFAULT NULL,
  `bid` int(11) NOT NULL DEFAULT '0',
  `brand` varchar(200) DEFAULT NULL,
  `sell_account` int(11) NOT NULL DEFAULT '0',
  `purchase_account` int(11) NOT NULL DEFAULT '0',
  `inventory_account` int(11) NOT NULL DEFAULT '0',
  `taxable` int(1) NOT NULL DEFAULT '0',
  `location` varchar(200) DEFAULT NULL,
  `item_number` varchar(100) NOT NULL DEFAULT '',
  `description` mediumtext NOT NULL,
  `type` enum('Service','Product') NOT NULL,
  `track_inventroy` enum('Yes','No') NOT NULL DEFAULT 'No',
  `negative_stock` enum('Yes','No') NOT NULL DEFAULT 'No',
  `available` int(11) NOT NULL DEFAULT '0',
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `added` date DEFAULT NULL,
  `last_sold` date DEFAULT NULL,
  `e` mediumtext NOT NULL,
  `sorder` int(11) NOT NULL DEFAULT '0',
  `gid` int(11) NOT NULL DEFAULT '0',
  `category_id` int(11) NOT NULL DEFAULT '0',
  `supplier_id` int(11) NOT NULL DEFAULT '0',
  `gname` varchar(100) DEFAULT NULL,
  `product_id` varchar(100) DEFAULT NULL,
  `size` varchar(100) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `expire_date` date DEFAULT NULL,
  `expire_days` int(11) NOT NULL DEFAULT '0',
  `image` text,
  `flag` int(1) NOT NULL DEFAULT '0',
  `is_service` int(1) NOT NULL DEFAULT '0',
  `commission_percent` decimal(16,2) NOT NULL DEFAULT '0.00',
  `commission_percent_type` varchar(100) DEFAULT NULL,
  `commission_fixed` decimal(16,2) NOT NULL DEFAULT '0.00',
  `trash` int(1) NOT NULL DEFAULT '0',
  `payterm` varchar(200) DEFAULT NULL,
  `cost_price` decimal(16,2) NOT NULL DEFAULT '0.00',
  `unit_price` decimal(16,2) NOT NULL DEFAULT '0.00',
  `promo_price` decimal(16,2) NOT NULL DEFAULT '0.00',
  `setup` decimal(16,2) NOT NULL DEFAULT '0.00',
  `onetime` decimal(16,2) NOT NULL DEFAULT '0.00',
  `monthly` decimal(16,2) NOT NULL DEFAULT '0.00',
  `monthlysetup` decimal(16,2) NOT NULL DEFAULT '0.00',
  `quarterly` decimal(16,2) NOT NULL DEFAULT '0.00',
  `quarterlysetup` decimal(16,2) NOT NULL DEFAULT '0.00',
  `halfyearly` decimal(16,2) NOT NULL DEFAULT '0.00',
  `halfyearlysetup` decimal(16,2) NOT NULL DEFAULT '0.00',
  `annually` decimal(16,2) NOT NULL DEFAULT '0.00',
  `annuallysetup` decimal(16,2) NOT NULL DEFAULT '0.00',
  `biennially` decimal(16,2) NOT NULL DEFAULT '0.00',
  `bienniallysetup` decimal(16,2) NOT NULL DEFAULT '0.00',
  `triennially` decimal(16,2) NOT NULL DEFAULT '0.00',
  `trienniallysetup` decimal(16,2) NOT NULL DEFAULT '0.00',
  `has_domain` varchar(100) DEFAULT NULL,
  `free_domain` varchar(100) DEFAULT NULL,
  `email_rel` int(11) NOT NULL DEFAULT '0',
  `tags` text,
  `sold_count` decimal(16,4) DEFAULT '0.0000',
  `total_amount` decimal(16,4) DEFAULT '0.0000',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sys_item_cats`
--

CREATE TABLE `sys_item_cats` (
  `id` int(11) NOT NULL,
  `workspace_id` int(11) UNSIGNED NOT NULL,
  `pid` int(11) NOT NULL DEFAULT '0',
  `name` varchar(200) DEFAULT NULL,
  `type` varchar(200) DEFAULT NULL,
  `img` varchar(200) DEFAULT NULL,
  `status` varchar(200) DEFAULT NULL,
  `description` text,
  `sorder` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sys_leads`
--

CREATE TABLE `sys_leads` (
  `id` int(11) NOT NULL,
  `workspace_id` int(11) UNSIGNED NOT NULL,
  `fullname` varchar(200) DEFAULT NULL,
  `company` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `color` varchar(20) DEFAULT NULL,
  `status` varchar(200) DEFAULT NULL,
  `source` varchar(200) DEFAULT NULL,
  `added_from` varchar(200) DEFAULT NULL,
  `o` varchar(200) DEFAULT NULL,
  `cid` int(11) NOT NULL DEFAULT '0',
  `aid` int(11) NOT NULL DEFAULT '0',
  `iid` int(11) NOT NULL DEFAULT '0',
  `oid` int(11) NOT NULL DEFAULT '0',
  `rid` int(11) NOT NULL DEFAULT '0',
  `sorder` int(11) NOT NULL DEFAULT '0',
  `assigned` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(200) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(200) DEFAULT NULL,
  `last_contact` datetime DEFAULT NULL,
  `last_contact_by` varchar(200) DEFAULT NULL,
  `date_converted` datetime DEFAULT NULL,
  `public` int(1) NOT NULL DEFAULT '0',
  `ratings` varchar(50) DEFAULT NULL,
  `flag` int(1) NOT NULL DEFAULT '0',
  `lost` int(1) NOT NULL DEFAULT '0',
  `junk` int(1) NOT NULL DEFAULT '0',
  `trash` int(1) NOT NULL DEFAULT '0',
  `archived` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sys_logs`
--

CREATE TABLE `sys_logs` (
  `id` int(10) NOT NULL,
  `workspace_id` int(11) UNSIGNED NOT NULL,
  `date` datetime DEFAULT NULL,
  `type` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `userid` int(10) NOT NULL,
  `ip` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sys_orders`
--

CREATE TABLE `sys_orders` (
  `id` int(11) NOT NULL,
  `workspace_id` int(11) UNSIGNED NOT NULL,
  `uuid` char(36) DEFAULT NULL,
  `ordernum` varchar(50) DEFAULT NULL,
  `source` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `sales_person` varchar(100) DEFAULT NULL,
  `branch_name` varchar(100) DEFAULT NULL,
  `cname` varchar(100) DEFAULT NULL,
  `cid` int(11) DEFAULT NULL,
  `contract_id` int(11) DEFAULT NULL,
  `bid` int(11) DEFAULT NULL,
  `date_added` date DEFAULT NULL,
  `date_expiry` date DEFAULT NULL,
  `pid` int(11) DEFAULT NULL,
  `stitle` varchar(200) DEFAULT NULL,
  `sid` int(11) DEFAULT NULL,
  `iid` int(11) DEFAULT NULL,
  `aid` int(11) DEFAULT NULL,
  `amount` decimal(16,2) NOT NULL DEFAULT '0.00',
  `recurring` decimal(16,2) NOT NULL DEFAULT '0.00',
  `setup_fee` decimal(16,2) NOT NULL DEFAULT '0.00',
  `billing_cycle` text,
  `addon_ids` text,
  `related_orders` text,
  `description` text,
  `upgrade_ids` text,
  `xdata` text,
  `xsecret` varchar(100) DEFAULT NULL,
  `promo_code` text,
  `promo_type` text,
  `promo_value` text,
  `payment_method` text,
  `ipaddress` text,
  `fraud_module` text,
  `fraud_output` text,
  `activation_subject` text,
  `activation_message` text,
  `trash` int(1) NOT NULL DEFAULT '0',
  `archived` int(1) NOT NULL DEFAULT '0',
  `c1` text,
  `c2` text,
  `c3` text,
  `c4` text,
  `c5` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sys_permissions`
--

CREATE TABLE `sys_permissions` (
  `id` int(11) NOT NULL,
  `workspace_id` int(11) UNSIGNED NOT NULL,
  `pname` varchar(200) DEFAULT NULL,
  `shortname` varchar(200) DEFAULT NULL,
  `available` int(1) NOT NULL DEFAULT '0',
  `core` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sys_permissions`
--

INSERT INTO `sys_permissions` (`id`, `workspace_id`, `pname`, `shortname`, `available`, `core`) VALUES
(1, 1, 'Customers', 'customers', 0, 1),
(2, 1, 'Companies', 'companies', 0, 1),
(3, 1, 'Transactions', 'transactions', 0, 1),
(4, 1, 'Sales', 'sales', 0, 1),
(5, 1, 'Bank & Cash', 'bank_n_cash', 0, 1),
(6, 1, 'Products & Services', 'products_n_services', 0, 1),
(7, 1, 'Reports', 'reports', 0, 1),
(8, 1, 'Utilities', 'utilities', 0, 1),
(9, 1, 'Appearance', 'appearance', 0, 1),
(10, 1, 'Plugins', 'plugins', 0, 1),
(11, 1, 'Calendar', 'calendar', 0, 1),
(12, 1, 'Leads', 'leads', 0, 1),
(13, 1, 'Tasks', 'tasks', 0, 1),
(14, 1, 'Contracts', 'contracts', 0, 1),
(15, 1, 'Orders', 'orders', 0, 1),
(16, 1, 'Settings', 'settings', 0, 1),
(17, 1, 'Documents', 'documents', 0, 1),
(18, 1, 'Purchase', 'purchase', 0, 1),
(19, 1, 'Suppliers', 'suppliers', 0, 1),
(20, 1, 'SMS', 'sms', 0, 1),
(21, 1, 'Support', 'support', 0, 1),
(22, 1, 'Knowledgebase', 'kb', 0, 1),
(23, 1, 'Password Manager', 'password_manager', 0, 1),
(24, 1, 'HRM', 'hr', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sys_pg`
--

CREATE TABLE `sys_pg` (
  `id` int(11) NOT NULL,
  `workspace_id` int(11) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `settings` text NOT NULL,
  `value` text NOT NULL,
  `processor` text NOT NULL,
  `ins` text NOT NULL,
  `c1` text NOT NULL,
  `c2` text NOT NULL,
  `c3` text NOT NULL,
  `c4` text NOT NULL,
  `c5` text NOT NULL,
  `status` enum('Active','Inactive') NOT NULL,
  `sorder` int(2) NOT NULL,
  `logo` varchar(200) DEFAULT NULL,
  `mode` varchar(200) DEFAULT NULL,
  `account_id` int(11) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sys_pg`
--

INSERT INTO `sys_pg` (`id`, `workspace_id`, `name`, `settings`, `value`, `processor`, `ins`, `c1`, `c2`, `c3`, `c4`, `c5`, `status`, `sorder`, `logo`, `mode`, `account_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'Paypal', 'Paypal Email', 'demo@example.com', 'paypal', 'Invoices', 'USD', '1', '', '', '', 'Active', 1, NULL, NULL, NULL, NULL, NULL),
(2, 1, 'Stripe', 'API Key', 'sk_test_ARblMczqDw61NusMMs7o1RVK', 'stripe', '', 'USD', '', '', '', '', 'Active', 2, NULL, NULL, NULL, NULL, NULL),
(3, 1, 'Bank / Cash', 'Instructions', 'Make a Payment to Our Bank Account <br>Bank Name: City Bank <br>Account Name: Sadia Sharmin <br>Account Number: 1505XXXXXXXX <br>', 'manualpayment', '', '', '', '', '', '', 'Active', 3, NULL, NULL, NULL, NULL, NULL),
(4, 1, 'Authorize.net', 'API_LOGIN_ID', 'Insert API Login ID here', 'authorize_net', '', 'Insert Transaction Key Here', '', '', '', '', 'Active', 4, NULL, '', NULL, NULL, NULL),
(5, 1, 'Braintree', 'Merchant ID', 'your merchant id', 'braintree', '', 'your public key', 'your private key', 'bank account', 'sandbox', '', 'Inactive', 5, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sys_pl`
--

CREATE TABLE `sys_pl` (
  `id` int(11) NOT NULL,
  `workspace_id` int(11) UNSIGNED NOT NULL,
  `c` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `sorder` int(11) NOT NULL DEFAULT '0',
  `build` int(10) DEFAULT '1',
  `c1` text,
  `c2` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sys_pmethods`
--

CREATE TABLE `sys_pmethods` (
  `id` int(11) NOT NULL,
  `workspace_id` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `sorder` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sys_pmethods`
--

INSERT INTO `sys_pmethods` (`id`, `workspace_id`, `name`, `sorder`) VALUES
(1, 1, 'Cash', 1),
(2, 1, 'Check', 4),
(3, 1, 'Credit Card', 5),
(4, 1, 'Debit', 6),
(5, 1, 'Electronic Transfer', 7),
(9, 1, 'Paypal', 2),
(10, 1, 'ATM Withdrawals', 3);

-- --------------------------------------------------------

--
-- Table structure for table `sys_purchaseitems`
--

CREATE TABLE `sys_purchaseitems` (
  `id` int(10) NOT NULL,
  `workspace_id` int(11) UNSIGNED NOT NULL,
  `invoiceid` int(10) NOT NULL DEFAULT '0',
  `userid` int(10) NOT NULL,
  `type` text NOT NULL,
  `relid` int(10) NOT NULL,
  `itemcode` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `qty` varchar(20) NOT NULL DEFAULT '1',
  `amount` decimal(14,2) NOT NULL DEFAULT '0.00',
  `taxed` int(1) NOT NULL,
  `tax_rate` decimal(16,2) DEFAULT NULL,
  `tax_name` varchar(200) DEFAULT NULL,
  `taxamount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `total` decimal(14,2) NOT NULL DEFAULT '0.00',
  `duedate` date DEFAULT NULL,
  `paymentmethod` text NOT NULL,
  `notes` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sys_purchases`
--

CREATE TABLE `sys_purchases` (
  `id` int(10) NOT NULL,
  `workspace_id` int(11) UNSIGNED NOT NULL,
  `userid` int(10) NOT NULL,
  `supplier_id` int(10) DEFAULT NULL,
  `supplier_name` varchar(200) DEFAULT NULL,
  `account` varchar(200) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `cn` varchar(100) NOT NULL DEFAULT '',
  `invoicenum` text NOT NULL,
  `date` date DEFAULT NULL,
  `duedate` date DEFAULT NULL,
  `datepaid` datetime DEFAULT NULL,
  `subtotal` decimal(18,2) NOT NULL,
  `discount_type` varchar(1) NOT NULL DEFAULT 'f',
  `discount_value` decimal(14,2) NOT NULL DEFAULT '0.00',
  `discount` decimal(14,2) NOT NULL DEFAULT '0.00',
  `credit` decimal(10,2) NOT NULL DEFAULT '0.00',
  `taxname` varchar(100) DEFAULT NULL,
  `tax` decimal(10,2) DEFAULT NULL,
  `tax2` decimal(10,2) DEFAULT NULL,
  `total` decimal(18,2) NOT NULL DEFAULT '0.00',
  `taxrate` decimal(10,2) DEFAULT NULL,
  `taxrate2` decimal(10,2) DEFAULT NULL,
  `status` varchar(200) DEFAULT NULL,
  `paymentmethod` text NOT NULL,
  `notes` text NOT NULL,
  `vtoken` varchar(20) NOT NULL,
  `ptoken` varchar(20) NOT NULL,
  `r` varchar(100) NOT NULL DEFAULT '0',
  `nd` date DEFAULT NULL,
  `eid` int(10) NOT NULL DEFAULT '0',
  `ename` varchar(200) NOT NULL DEFAULT '',
  `vid` int(11) NOT NULL DEFAULT '0',
  `currency` int(11) NOT NULL DEFAULT '0',
  `currency_symbol` varchar(10) DEFAULT NULL,
  `currency_prefix` varchar(10) DEFAULT NULL,
  `currency_suffix` varchar(10) DEFAULT NULL,
  `currency_rate` decimal(11,4) NOT NULL DEFAULT '1.0000',
  `recurring` tinyint(1) NOT NULL DEFAULT '0',
  `recurring_ends` date DEFAULT NULL,
  `last_recurring_date` date DEFAULT NULL,
  `source` varchar(200) DEFAULT NULL,
  `sale_agent` int(11) NOT NULL DEFAULT '0',
  `last_overdue_reminder` date DEFAULT NULL,
  `allowed_payment_methods` text,
  `billing_street` varchar(200) DEFAULT NULL,
  `billing_city` varchar(100) DEFAULT NULL,
  `billing_state` varchar(100) DEFAULT NULL,
  `billing_zip` varchar(50) DEFAULT NULL,
  `billing_country` varchar(100) DEFAULT NULL,
  `shipping_street` varchar(200) DEFAULT NULL,
  `shipping_city` varchar(100) DEFAULT NULL,
  `shipping_state` varchar(100) DEFAULT NULL,
  `shipping_zip` varchar(100) DEFAULT NULL,
  `shipping_country` varchar(100) DEFAULT NULL,
  `q_hide` tinyint(1) NOT NULL DEFAULT '0',
  `show_quantity_as` varchar(100) DEFAULT NULL,
  `pid` int(11) NOT NULL DEFAULT '0',
  `is_credit_invoice` int(1) NOT NULL DEFAULT '0',
  `aid` int(11) NOT NULL DEFAULT '0',
  `aname` varchar(200) DEFAULT NULL,
  `receipt_number` varchar(200) DEFAULT NULL,
  `stage` varchar(200) DEFAULT 'Pending',
  `subject` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sys_quoteitems`
--

CREATE TABLE `sys_quoteitems` (
  `id` int(10) NOT NULL,
  `workspace_id` int(11) UNSIGNED NOT NULL,
  `qid` int(10) NOT NULL,
  `itemcode` text NOT NULL,
  `description` text NOT NULL,
  `qty` text NOT NULL,
  `amount` decimal(18,2) NOT NULL,
  `discount` decimal(10,2) NOT NULL,
  `total` decimal(18,2) NOT NULL,
  `taxable` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sys_quotes`
--

CREATE TABLE `sys_quotes` (
  `id` int(10) NOT NULL,
  `workspace_id` int(11) UNSIGNED NOT NULL,
  `uuid` char(36) DEFAULT NULL,
  `subject` text NOT NULL,
  `stage` enum('Draft','Delivered','On Hold','Accepted','Lost','Dead') NOT NULL,
  `validuntil` date NOT NULL,
  `userid` int(10) NOT NULL,
  `invoicenum` text NOT NULL,
  `cn` text NOT NULL,
  `account` text NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `companyname` text NOT NULL,
  `email` text NOT NULL,
  `address1` text NOT NULL,
  `address2` text NOT NULL,
  `city` text NOT NULL,
  `state` text NOT NULL,
  `postcode` text NOT NULL,
  `country` text NOT NULL,
  `phonenumber` text NOT NULL,
  `currency` int(10) NOT NULL,
  `subtotal` decimal(18,2) NOT NULL,
  `discount_type` text NOT NULL,
  `discount_value` decimal(10,2) NOT NULL,
  `discount` decimal(10,2) NOT NULL,
  `taxname` text NOT NULL,
  `taxrate` decimal(10,2) NOT NULL,
  `tax1` decimal(10,2) NOT NULL,
  `tax2` decimal(10,2) NOT NULL,
  `total` decimal(18,2) NOT NULL,
  `proposal` text NOT NULL,
  `customernotes` text NOT NULL,
  `adminnotes` text NOT NULL,
  `datecreated` date NOT NULL,
  `lastmodified` date NOT NULL,
  `datesent` date NOT NULL,
  `dateaccepted` date NOT NULL,
  `vtoken` text NOT NULL,
  `code` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sys_roles`
--

CREATE TABLE `sys_roles` (
  `id` int(11) NOT NULL,
  `workspace_id` int(11) UNSIGNED NOT NULL,
  `rname` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sys_roles`
--

INSERT INTO `sys_roles` (`id`, `workspace_id`, `rname`) VALUES
(3, 0, 'Employee');

-- --------------------------------------------------------

--
-- Table structure for table `sys_sales`
--

CREATE TABLE `sys_sales` (
  `id` int(11) NOT NULL,
  `workspace_id` int(11) UNSIGNED NOT NULL,
  `cid` int(11) NOT NULL DEFAULT '0',
  `oid` int(11) NOT NULL DEFAULT '0',
  `oname` varchar(200) NOT NULL,
  `description` mediumtext NOT NULL,
  `amount` decimal(14,2) NOT NULL,
  `term` varchar(100) NOT NULL,
  `milestone` varchar(100) NOT NULL,
  `p` int(11) NOT NULL,
  `o` int(11) NOT NULL,
  `open` date NOT NULL,
  `close` date NOT NULL,
  `status` enum('New','In Progress','Won','Lost') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sys_schedule`
--

CREATE TABLE `sys_schedule` (
  `id` int(11) NOT NULL,
  `workspace_id` int(11) UNSIGNED NOT NULL,
  `cname` mediumtext NOT NULL,
  `val` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sys_schedule`
--

INSERT INTO `sys_schedule` (`id`, `workspace_id`, `cname`, `val`) VALUES
(1, 1, 'accounting_snapshot', 'Active'),
(2, 1, 'recurring_invoice', 'Active'),
(3, 1, 'notify', 'Active'),
(4, 1, 'notifyemail', 'demo@example.com'),
(5, 2, 'accounting_snapshot', 'Active'),
(6, 2, 'recurring_invoice', 'Active'),
(7, 2, 'notify', 'Active'),
(8, 2, 'notifyemail', 'demo@example.com'),
(9, 3, 'accounting_snapshot', 'Active'),
(10, 3, 'recurring_invoice', 'Active'),
(11, 3, 'notify', 'Active'),
(12, 3, 'notifyemail', 'demo@example.com');

-- --------------------------------------------------------

--
-- Table structure for table `sys_schedulelogs`
--

CREATE TABLE `sys_schedulelogs` (
  `id` int(11) NOT NULL,
  `workspace_id` int(11) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `logs` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sys_staffpermissions`
--

CREATE TABLE `sys_staffpermissions` (
  `id` int(11) NOT NULL,
  `workspace_id` int(11) UNSIGNED NOT NULL,
  `rid` int(11) DEFAULT NULL,
  `pid` int(11) DEFAULT NULL,
  `shortname` varchar(50) DEFAULT NULL,
  `can_view` int(1) NOT NULL DEFAULT '0',
  `can_edit` int(1) NOT NULL DEFAULT '0',
  `can_create` int(1) NOT NULL DEFAULT '0',
  `can_delete` int(1) NOT NULL DEFAULT '0',
  `all_data` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sys_staffpermissions`
--

INSERT INTO `sys_staffpermissions` (`id`, `workspace_id`, `rid`, `pid`, `shortname`, `can_view`, `can_edit`, `can_create`, `can_delete`, `all_data`) VALUES
(111, 1, 3, 1, 'customers', 1, 1, 1, 1, 0),
(112, 1, 3, 2, 'companies', 0, 0, 0, 0, 0),
(113, 1, 3, 3, 'transactions', 0, 0, 0, 0, 0),
(114, 1, 3, 4, 'sales', 0, 0, 0, 0, 0),
(115, 1, 3, 5, 'bank_n_cash', 0, 0, 0, 0, 0),
(116, 1, 3, 6, 'products_n_services', 0, 0, 0, 0, 0),
(117, 1, 3, 7, 'reports', 0, 0, 0, 0, 0),
(118, 1, 3, 8, 'utilities', 0, 0, 0, 0, 0),
(119, 1, 3, 9, 'appearance', 0, 0, 0, 0, 0),
(120, 1, 3, 10, 'plugins', 0, 0, 0, 0, 0),
(121, 1, 3, 11, 'calendar', 0, 0, 0, 0, 0),
(122, 1, 3, 12, 'leads', 0, 0, 0, 0, 0),
(123, 1, 3, 13, 'tasks', 0, 0, 0, 0, 0),
(124, 1, 3, 14, 'contracts', 0, 0, 0, 0, 0),
(125, 1, 3, 15, 'orders', 0, 0, 0, 0, 0),
(126, 1, 3, 16, 'settings', 0, 0, 0, 0, 0),
(127, 1, 3, 17, 'documents', 0, 0, 0, 0, 0),
(128, 1, 3, 18, 'purchase', 0, 0, 0, 0, 0),
(129, 1, 3, 19, 'suppliers', 0, 0, 0, 0, 0),
(130, 1, 3, 20, 'sms', 0, 0, 0, 0, 0),
(131, 1, 3, 21, 'support', 0, 0, 0, 0, 0),
(132, 1, 3, 22, 'kb', 0, 0, 0, 0, 0),
(133, 1, 3, 23, 'password_manager', 0, 0, 0, 0, 0),
(134, 1, 3, 24, 'hr', 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sys_status`
--

CREATE TABLE `sys_status` (
  `id` int(11) UNSIGNED NOT NULL,
  `workspace_id` int(11) UNSIGNED NOT NULL,
  `type` varchar(200) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `sorder` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sys_status`
--

INSERT INTO `sys_status` (`id`, `workspace_id`, `type`, `name`, `sorder`, `created_at`, `updated_at`) VALUES
(1, 1, 'Purchase Invoice', 'Pending', NULL, NULL, NULL),
(2, 1, 'Purchase Invoice', 'Accepted', NULL, NULL, NULL),
(3, 1, 'Purchase Invoice', 'Declined', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sys_tags`
--

CREATE TABLE `sys_tags` (
  `id` int(11) NOT NULL,
  `workspace_id` int(11) UNSIGNED NOT NULL,
  `text` varchar(100) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sys_tasks`
--

CREATE TABLE `sys_tasks` (
  `id` int(11) NOT NULL,
  `workspace_id` int(11) UNSIGNED NOT NULL,
  `title` text,
  `description` text,
  `status` varchar(200) DEFAULT NULL,
  `cid` int(11) NOT NULL DEFAULT '0',
  `oid` int(11) NOT NULL DEFAULT '0',
  `iid` int(11) NOT NULL DEFAULT '0',
  `aid` int(11) NOT NULL DEFAULT '0',
  `tid` int(11) NOT NULL DEFAULT '0',
  `eid` int(11) NOT NULL DEFAULT '0',
  `pid` int(11) NOT NULL DEFAULT '0',
  `did` int(11) NOT NULL DEFAULT '0',
  `company_id` int(11) NOT NULL DEFAULT '0',
  `subscribers` text,
  `assigned_to` text,
  `priority` varchar(200) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(200) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(200) DEFAULT NULL,
  `vtoken` varchar(50) DEFAULT NULL,
  `ptoken` varchar(50) DEFAULT NULL,
  `started` date DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `stime` varchar(50) DEFAULT NULL,
  `dtime` varchar(50) DEFAULT NULL,
  `time_spent` varchar(50) DEFAULT NULL,
  `date_finished` date DEFAULT NULL,
  `source` varchar(100) DEFAULT NULL,
  `flag` int(1) NOT NULL DEFAULT '0',
  `finished` int(1) NOT NULL DEFAULT '0',
  `ratings` varchar(50) DEFAULT NULL,
  `rel_type` varchar(50) DEFAULT NULL,
  `rel_id` int(11) DEFAULT NULL,
  `parent` int(11) NOT NULL DEFAULT '0',
  `is_public` int(1) NOT NULL DEFAULT '0',
  `billable` int(1) NOT NULL DEFAULT '0',
  `billed` int(1) NOT NULL DEFAULT '0',
  `hourly_rate` decimal(14,2) NOT NULL DEFAULT '0.00',
  `milestone` int(11) DEFAULT NULL,
  `progress` int(3) DEFAULT NULL,
  `visible_to_client` int(1) NOT NULL DEFAULT '0',
  `notification` int(1) NOT NULL DEFAULT '0',
  `trash` int(1) NOT NULL DEFAULT '0',
  `archived` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sys_tax`
--

CREATE TABLE `sys_tax` (
  `id` int(10) NOT NULL,
  `workspace_id` int(11) UNSIGNED NOT NULL,
  `name` text,
  `state` text,
  `country` text,
  `rate` decimal(10,2) DEFAULT NULL,
  `aid` int(11) DEFAULT NULL,
  `bal` decimal(10,2) DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_default` int(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sys_tax`
--

INSERT INTO `sys_tax` (`id`, `workspace_id`, `name`, `state`, `country`, `rate`, `aid`, `bal`, `created_at`, `updated_at`, `is_default`) VALUES
(1, 1, 'None', NULL, NULL, '0.00', NULL, '0.00', '2018-05-17 05:05:31', '2018-05-17 05:05:31', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sys_ticketdepartments`
--

CREATE TABLE `sys_ticketdepartments` (
  `id` int(11) NOT NULL,
  `workspace_id` int(11) UNSIGNED NOT NULL,
  `dname` varchar(200) DEFAULT NULL,
  `description` text,
  `email` varchar(200) DEFAULT NULL,
  `hidden` int(1) NOT NULL DEFAULT '0',
  `delete_after_import` int(1) NOT NULL DEFAULT '0',
  `host` varchar(200) DEFAULT NULL,
  `port` varchar(50) DEFAULT NULL,
  `username` varchar(200) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `encryption` varchar(100) DEFAULT NULL,
  `calendar_id` varchar(200) DEFAULT NULL,
  `sorder` int(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sys_ticketdepartments`
--

INSERT INTO `sys_ticketdepartments` (`id`, `workspace_id`, `dname`, `description`, `email`, `hidden`, `delete_after_import`, `host`, `port`, `username`, `password`, `encryption`, `calendar_id`, `sorder`, `created_at`, `updated_at`) VALUES
(2, 1, 'Support', NULL, '', 0, 0, '', '', '', '', 'no', NULL, 1, NULL, NULL),
(3, 1, 'Sales', NULL, '', 0, 0, '', '', '', '', 'no', NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sys_ticketmaillog`
--

CREATE TABLE `sys_ticketmaillog` (
  `id` int(11) NOT NULL,
  `workspace_id` int(11) UNSIGNED NOT NULL,
  `date` datetime DEFAULT NULL,
  `account` varchar(200) DEFAULT NULL,
  `subject` varchar(200) DEFAULT NULL,
  `message` text,
  `status` varchar(100) DEFAULT NULL,
  `attachments` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sys_ticketpredefinedreplies`
--

CREATE TABLE `sys_ticketpredefinedreplies` (
  `id` int(11) NOT NULL,
  `workspace_id` int(11) UNSIGNED NOT NULL,
  `rname` varchar(200) DEFAULT NULL,
  `reply` text,
  `tags` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `attachments` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sys_ticketreplies`
--

CREATE TABLE `sys_ticketreplies` (
  `id` int(11) NOT NULL,
  `workspace_id` int(11) UNSIGNED NOT NULL,
  `tid` int(11) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `account` varchar(200) DEFAULT NULL,
  `reply_type` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `message` text,
  `replied_by` varchar(200) DEFAULT NULL,
  `admin` varchar(100) DEFAULT NULL,
  `attachments` text,
  `client_read` varchar(100) DEFAULT NULL,
  `admin_read` varchar(100) DEFAULT NULL,
  `rating` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sys_tickets`
--

CREATE TABLE `sys_tickets` (
  `id` int(11) NOT NULL,
  `workspace_id` int(11) UNSIGNED NOT NULL,
  `uuid` char(36) DEFAULT NULL,
  `tid` varchar(100) DEFAULT NULL,
  `did` int(10) DEFAULT NULL,
  `aid` int(10) DEFAULT NULL,
  `pid` int(10) DEFAULT NULL,
  `sid` int(10) DEFAULT NULL,
  `lid` int(10) DEFAULT NULL,
  `oid` int(10) DEFAULT NULL,
  `company_id` int(10) DEFAULT NULL,
  `dname` varchar(100) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `account` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `cc` varchar(200) DEFAULT NULL,
  `bcc` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `subject` text,
  `message` text,
  `status` varchar(100) DEFAULT NULL,
  `urgency` varchar(100) DEFAULT NULL,
  `admin` varchar(100) DEFAULT NULL,
  `attachments` text,
  `last_reply` varchar(100) DEFAULT NULL,
  `flag` int(1) DEFAULT NULL,
  `escalated` int(1) DEFAULT NULL,
  `replying` int(1) DEFAULT NULL,
  `is_spam` int(1) DEFAULT NULL,
  `rating` int(2) DEFAULT NULL,
  `client_read` varchar(100) DEFAULT NULL,
  `admin_read` varchar(100) DEFAULT NULL,
  `source` varchar(100) DEFAULT NULL,
  `ttype` varchar(100) DEFAULT NULL,
  `tstart` varchar(100) DEFAULT NULL,
  `tend` varchar(100) DEFAULT NULL,
  `ttotal` varchar(100) DEFAULT NULL,
  `todo` text,
  `tags` text,
  `notes` text,
  `code` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sys_transactions`
--

CREATE TABLE `sys_transactions` (
  `id` int(11) NOT NULL,
  `workspace_id` int(11) UNSIGNED NOT NULL,
  `uuid` char(36) DEFAULT NULL,
  `account` varchar(200) NOT NULL,
  `type` enum('Income','Expense','Transfer') NOT NULL,
  `sub_type` varchar(200) DEFAULT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `category` varchar(200) DEFAULT NULL,
  `amount` decimal(18,2) DEFAULT NULL,
  `payer` varchar(200) DEFAULT NULL,
  `payee` varchar(200) DEFAULT NULL,
  `payerid` int(11) NOT NULL DEFAULT '0',
  `payeeid` int(11) NOT NULL DEFAULT '0',
  `method` varchar(200) DEFAULT NULL,
  `ref` varchar(200) DEFAULT NULL,
  `status` enum('Cleared','Uncleared','Reconciled','Void') NOT NULL DEFAULT 'Cleared',
  `description` text,
  `tags` text,
  `tax` decimal(18,2) NOT NULL DEFAULT '0.00',
  `date` date DEFAULT NULL,
  `dr` decimal(18,2) NOT NULL DEFAULT '0.00',
  `cr` decimal(18,2) NOT NULL DEFAULT '0.00',
  `bal` decimal(18,2) NOT NULL DEFAULT '0.00',
  `iid` int(11) NOT NULL DEFAULT '0',
  `currency` int(11) NOT NULL DEFAULT '0',
  `currency_symbol` varchar(10) DEFAULT NULL,
  `currency_prefix` varchar(10) DEFAULT NULL,
  `currency_suffix` varchar(10) DEFAULT NULL,
  `currency_rate` decimal(11,4) NOT NULL DEFAULT '1.0000',
  `base_amount` decimal(16,4) NOT NULL DEFAULT '0.0000',
  `company_id` int(11) NOT NULL DEFAULT '0',
  `vid` int(11) NOT NULL DEFAULT '0',
  `aid` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) NOT NULL DEFAULT '0',
  `attachments` text,
  `source` varchar(200) DEFAULT NULL,
  `rid` int(11) NOT NULL DEFAULT '0',
  `pid` int(11) NOT NULL DEFAULT '0',
  `archived` int(1) NOT NULL DEFAULT '0',
  `trash` int(1) NOT NULL DEFAULT '0',
  `flag` int(1) NOT NULL DEFAULT '0',
  `c1` text,
  `c2` text,
  `c3` text,
  `c4` text,
  `c5` text,
  `purchase_id` int(11) DEFAULT NULL,
  `code` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sys_units`
--

CREATE TABLE `sys_units` (
  `id` int(11) NOT NULL,
  `workspace_id` int(11) UNSIGNED NOT NULL,
  `type` varchar(200) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `reference` varchar(200) DEFAULT NULL,
  `conversion_factor` decimal(16,2) NOT NULL DEFAULT '0.00',
  `sorder` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sys_users`
--

CREATE TABLE `sys_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `workspace_id` int(11) UNSIGNED NOT NULL,
  `username` varchar(100) NOT NULL DEFAULT '',
  `fullname` varchar(100) NOT NULL DEFAULT '',
  `phonenumber` varchar(20) DEFAULT NULL,
  `password` text,
  `user_type` varchar(50) NOT NULL DEFAULT 'Full Access',
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `last_login` datetime DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `creationdate` datetime NOT NULL,
  `otp` enum('Yes','No') NOT NULL DEFAULT 'No',
  `img` text NOT NULL,
  `api` enum('Yes','No') DEFAULT 'No',
  `pwresetkey` varchar(100) NOT NULL,
  `keyexpire` varchar(100) NOT NULL,
  `roleid` int(11) NOT NULL DEFAULT '0',
  `role` varchar(200) DEFAULT NULL,
  `last_activity` datetime DEFAULT NULL,
  `autologin` varchar(200) DEFAULT NULL,
  `at` varchar(200) DEFAULT NULL,
  `landing_page` varchar(200) DEFAULT NULL,
  `language` varchar(100) DEFAULT NULL,
  `notes` text,
  `is_email_verified` tinyint(1) NOT NULL,
  `is_phone_verified` tinyint(1) NOT NULL,
  `activation_key` varchar(100) NOT NULL DEFAULT '',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `sms_notify` int(1) DEFAULT NULL,
  `email_notify` int(1) DEFAULT NULL,
  `slack_notify` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sys_users`
--

INSERT INTO `sys_users` (`id`, `workspace_id`, `username`, `fullname`, `phonenumber`, `password`, `user_type`, `status`, `last_login`, `email`, `creationdate`, `otp`, `img`, `api`, `pwresetkey`, `keyexpire`, `roleid`, `role`, `last_activity`, `autologin`, `at`, `landing_page`, `language`, `notes`, `is_email_verified`, `is_phone_verified`, `activation_key`, `created_at`, `updated_at`, `sms_notify`, `email_notify`, `slack_notify`) VALUES
(1, 1, 'demo@example.com', 'John Doe', '', '$1$WN..nD2.$Vo9niDl/fUf0VhheEjmHe/', 'Admin', 'Active', '2018-10-05 02:28:51', '', '2014-10-20 01:43:07', 'No', '', 'No', '', '0', 0, NULL, NULL, 'mlic2gxjgm3gkhiydbw51', NULL, NULL, 'en', NULL, 0, 0, '', NULL, '2018-05-17 07:05:31', 1, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `workspaces`
--

CREATE TABLE `workspaces` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` char(36) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `base_url` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_subscribed` tinyint(1) NOT NULL DEFAULT '1',
  `plan` varchar(100) DEFAULT NULL,
  `fee` decimal(14,2) NOT NULL DEFAULT '0.00',
  `trial_ends_at` date DEFAULT NULL,
  `monthly_fee` decimal(10,2) NOT NULL DEFAULT '0.00',
  `owner_id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `workspaces`
--

INSERT INTO `workspaces` (`id`, `username`, `name`, `type`, `base_url`, `is_active`, `is_subscribed`, `plan`, `fee`, `trial_ends_at`, `monthly_fee`, `owner_id`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'cloudonex', 'CloudOnex', 'Business', '', 1, 1, NULL, '0.00', NULL, '0.00', 1, 0, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_balances`
--
ALTER TABLE `account_balances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `app_password_manager`
--
ALTER TABLE `app_password_manager`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `app_settings`
--
ALTER TABLE `app_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `app_sms`
--
ALTER TABLE `app_sms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `app_sms_drivers`
--
ALTER TABLE `app_sms_drivers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `app_sms_templates`
--
ALTER TABLE `app_sms_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assets`
--
ALTER TABLE `assets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clx_integrations`
--
ALTER TABLE `clx_integrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clx_shared_preferences`
--
ALTER TABLE `clx_shared_preferences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `credit_cards`
--
ALTER TABLE `credit_cards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crm_accounts`
--
ALTER TABLE `crm_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crm_customfields`
--
ALTER TABLE `crm_customfields`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crm_customfieldsvalues`
--
ALTER TABLE `crm_customfieldsvalues`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crm_groups`
--
ALTER TABLE `crm_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crm_industries`
--
ALTER TABLE `crm_industries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crm_leads`
--
ALTER TABLE `crm_leads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crm_lead_sources`
--
ALTER TABLE `crm_lead_sources`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crm_lead_status`
--
ALTER TABLE `crm_lead_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crm_salutations`
--
ALTER TABLE `crm_salutations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense_types`
--
ALTER TABLE `expense_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ib_assets`
--
ALTER TABLE `ib_assets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ib_doc_rel`
--
ALTER TABLE `ib_doc_rel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ib_invoice_access_log`
--
ALTER TABLE `ib_invoice_access_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ib_kb`
--
ALTER TABLE `ib_kb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ib_kb_groups`
--
ALTER TABLE `ib_kb_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ib_kb_rel`
--
ALTER TABLE `ib_kb_rel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ib_kb_replies`
--
ALTER TABLE `ib_kb_replies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_categories`
--
ALTER TABLE `item_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `relations`
--
ALTER TABLE `relations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_accounts`
--
ALTER TABLE `sys_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_activity`
--
ALTER TABLE `sys_activity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_api`
--
ALTER TABLE `sys_api`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_appconfig`
--
ALTER TABLE `sys_appconfig`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_canned_responses`
--
ALTER TABLE `sys_canned_responses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_cart`
--
ALTER TABLE `sys_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_cats`
--
ALTER TABLE `sys_cats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_companies`
--
ALTER TABLE `sys_companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_currencies`
--
ALTER TABLE `sys_currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_documents`
--
ALTER TABLE `sys_documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_emailconfig`
--
ALTER TABLE `sys_emailconfig`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_email_logs`
--
ALTER TABLE `sys_email_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_email_templates`
--
ALTER TABLE `sys_email_templates`
  ADD PRIMARY KEY (`id`,`language_id`),
  ADD KEY `tplname` (`tplname`(32));

--
-- Indexes for table `sys_events`
--
ALTER TABLE `sys_events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_invoiceitems`
--
ALTER TABLE `sys_invoiceitems`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoiceid` (`invoiceid`);

--
-- Indexes for table `sys_invoices`
--
ALTER TABLE `sys_invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`),
  ADD KEY `status` (`status`(3));

--
-- Indexes for table `sys_items`
--
ALTER TABLE `sys_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_item_cats`
--
ALTER TABLE `sys_item_cats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_leads`
--
ALTER TABLE `sys_leads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_logs`
--
ALTER TABLE `sys_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_orders`
--
ALTER TABLE `sys_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_permissions`
--
ALTER TABLE `sys_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_pg`
--
ALTER TABLE `sys_pg`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gateway_setting` (`name`(32),`processor`(32)),
  ADD KEY `setting_value` (`processor`(32),`ins`(32));

--
-- Indexes for table `sys_pl`
--
ALTER TABLE `sys_pl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_pmethods`
--
ALTER TABLE `sys_pmethods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_purchaseitems`
--
ALTER TABLE `sys_purchaseitems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_purchases`
--
ALTER TABLE `sys_purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_quoteitems`
--
ALTER TABLE `sys_quoteitems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_quotes`
--
ALTER TABLE `sys_quotes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_roles`
--
ALTER TABLE `sys_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_sales`
--
ALTER TABLE `sys_sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_schedule`
--
ALTER TABLE `sys_schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_schedulelogs`
--
ALTER TABLE `sys_schedulelogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_staffpermissions`
--
ALTER TABLE `sys_staffpermissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_status`
--
ALTER TABLE `sys_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_tags`
--
ALTER TABLE `sys_tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_tasks`
--
ALTER TABLE `sys_tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_tax`
--
ALTER TABLE `sys_tax`
  ADD PRIMARY KEY (`id`),
  ADD KEY `state_country` (`state`(32),`country`(2));

--
-- Indexes for table `sys_ticketdepartments`
--
ALTER TABLE `sys_ticketdepartments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_ticketmaillog`
--
ALTER TABLE `sys_ticketmaillog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_ticketpredefinedreplies`
--
ALTER TABLE `sys_ticketpredefinedreplies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_ticketreplies`
--
ALTER TABLE `sys_ticketreplies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_tickets`
--
ALTER TABLE `sys_tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_transactions`
--
ALTER TABLE `sys_transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_units`
--
ALTER TABLE `sys_units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_users`
--
ALTER TABLE `sys_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `workspaces`
--
ALTER TABLE `workspaces`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `workspaces_username_unique` (`username`),
  ADD UNIQUE KEY `workspaces_base_url_unique` (`base_url`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_balances`
--
ALTER TABLE `account_balances`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `app_password_manager`
--
ALTER TABLE `app_password_manager`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `app_settings`
--
ALTER TABLE `app_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `app_sms`
--
ALTER TABLE `app_sms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `app_sms_drivers`
--
ALTER TABLE `app_sms_drivers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `app_sms_templates`
--
ALTER TABLE `app_sms_templates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `assets`
--
ALTER TABLE `assets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clx_integrations`
--
ALTER TABLE `clx_integrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clx_shared_preferences`
--
ALTER TABLE `clx_shared_preferences`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `credit_cards`
--
ALTER TABLE `credit_cards`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `crm_accounts`
--
ALTER TABLE `crm_accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `crm_customfields`
--
ALTER TABLE `crm_customfields`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `crm_customfieldsvalues`
--
ALTER TABLE `crm_customfieldsvalues`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `crm_groups`
--
ALTER TABLE `crm_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `crm_industries`
--
ALTER TABLE `crm_industries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `crm_leads`
--
ALTER TABLE `crm_leads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `crm_lead_sources`
--
ALTER TABLE `crm_lead_sources`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `crm_lead_status`
--
ALTER TABLE `crm_lead_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `crm_salutations`
--
ALTER TABLE `crm_salutations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `expense_types`
--
ALTER TABLE `expense_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ib_assets`
--
ALTER TABLE `ib_assets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ib_doc_rel`
--
ALTER TABLE `ib_doc_rel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ib_invoice_access_log`
--
ALTER TABLE `ib_invoice_access_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ib_kb`
--
ALTER TABLE `ib_kb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ib_kb_groups`
--
ALTER TABLE `ib_kb_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ib_kb_rel`
--
ALTER TABLE `ib_kb_rel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ib_kb_replies`
--
ALTER TABLE `ib_kb_replies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `item_categories`
--
ALTER TABLE `item_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `relations`
--
ALTER TABLE `relations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sys_accounts`
--
ALTER TABLE `sys_accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sys_activity`
--
ALTER TABLE `sys_activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sys_api`
--
ALTER TABLE `sys_api`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sys_appconfig`
--
ALTER TABLE `sys_appconfig`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=196;

--
-- AUTO_INCREMENT for table `sys_canned_responses`
--
ALTER TABLE `sys_canned_responses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sys_cart`
--
ALTER TABLE `sys_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sys_cats`
--
ALTER TABLE `sys_cats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `sys_companies`
--
ALTER TABLE `sys_companies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sys_currencies`
--
ALTER TABLE `sys_currencies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sys_documents`
--
ALTER TABLE `sys_documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sys_emailconfig`
--
ALTER TABLE `sys_emailconfig`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sys_email_logs`
--
ALTER TABLE `sys_email_logs`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sys_email_templates`
--
ALTER TABLE `sys_email_templates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `sys_events`
--
ALTER TABLE `sys_events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sys_invoiceitems`
--
ALTER TABLE `sys_invoiceitems`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sys_invoices`
--
ALTER TABLE `sys_invoices`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sys_items`
--
ALTER TABLE `sys_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sys_item_cats`
--
ALTER TABLE `sys_item_cats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sys_leads`
--
ALTER TABLE `sys_leads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sys_logs`
--
ALTER TABLE `sys_logs`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sys_orders`
--
ALTER TABLE `sys_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sys_permissions`
--
ALTER TABLE `sys_permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `sys_pg`
--
ALTER TABLE `sys_pg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sys_pl`
--
ALTER TABLE `sys_pl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sys_pmethods`
--
ALTER TABLE `sys_pmethods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sys_purchaseitems`
--
ALTER TABLE `sys_purchaseitems`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sys_purchases`
--
ALTER TABLE `sys_purchases`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sys_quoteitems`
--
ALTER TABLE `sys_quoteitems`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sys_quotes`
--
ALTER TABLE `sys_quotes`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sys_roles`
--
ALTER TABLE `sys_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sys_sales`
--
ALTER TABLE `sys_sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sys_schedule`
--
ALTER TABLE `sys_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `sys_schedulelogs`
--
ALTER TABLE `sys_schedulelogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sys_staffpermissions`
--
ALTER TABLE `sys_staffpermissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT for table `sys_status`
--
ALTER TABLE `sys_status`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sys_tags`
--
ALTER TABLE `sys_tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sys_tasks`
--
ALTER TABLE `sys_tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sys_tax`
--
ALTER TABLE `sys_tax`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sys_ticketdepartments`
--
ALTER TABLE `sys_ticketdepartments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sys_ticketmaillog`
--
ALTER TABLE `sys_ticketmaillog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sys_ticketpredefinedreplies`
--
ALTER TABLE `sys_ticketpredefinedreplies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sys_ticketreplies`
--
ALTER TABLE `sys_ticketreplies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sys_tickets`
--
ALTER TABLE `sys_tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sys_transactions`
--
ALTER TABLE `sys_transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sys_units`
--
ALTER TABLE `sys_units`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sys_users`
--
ALTER TABLE `sys_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `workspaces`
--
ALTER TABLE `workspaces`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
