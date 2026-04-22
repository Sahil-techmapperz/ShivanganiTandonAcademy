-- MySQL dump 10.13  Distrib 8.0.41, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: shivanganitandonacademy
-- ------------------------------------------------------
-- Server version	8.0.41

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `contact_messages`
--

DROP TABLE IF EXISTS `contact_messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contact_messages` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_general_ci,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact_messages`
--

LOCK TABLES `contact_messages` WRITE;
/*!40000 ALTER TABLE `contact_messages` DISABLE KEYS */;
/*!40000 ALTER TABLE `contact_messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hiring_requests`
--

DROP TABLE IF EXISTS `hiring_requests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `hiring_requests` (
  `id` int NOT NULL AUTO_INCREMENT,
  `organisation_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `contact_number` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `full_name` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `requirement_type` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `skills` text COLLATE utf8mb4_general_ci,
  `message` text COLLATE utf8mb4_general_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hiring_requests`
--

LOCK TABLES `hiring_requests` WRITE;
/*!40000 ALTER TABLE `hiring_requests` DISABLE KEYS */;
/*!40000 ALTER TABLE `hiring_requests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inquiries`
--

DROP TABLE IF EXISTS `inquiries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `inquiries` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `mobile` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `current_status` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `area_of_interest` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `query` text COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inquiries`
--

LOCK TABLES `inquiries` WRITE;
/*!40000 ALTER TABLE `inquiries` DISABLE KEYS */;
/*!40000 ALTER TABLE `inquiries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `version` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `class` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `group` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `namespace` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `time` int NOT NULL,
  `batch` int unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2026-04-21-065738','App\\Database\\Migrations\\CreateUsersTable','default','App',1776754696,1),(2,'2026-04-21-090000','App\\Database\\Migrations\\CreateExamSubmissionsTable','default','App',1776762106,2),(3,'2026-04-21-092744','App\\Database\\Migrations\\CreateLessonProgressTable','default','App',1776763743,3),(4,'2026-04-21-095827','App\\Database\\Migrations\\AddTypeToLessonsTable','default','App',1776765537,4),(5,'2026-04-21-110629','App\\Database\\Migrations\\AddQuestionPaperToQuestions','default','App',1776769622,5),(6,'2026-04-21-122721','App\\Database\\Migrations\\AddPassingScoreToLessons','default','App',1776774476,6),(7,'2026-04-22-052133','App\\Database\\Migrations\\AddMessageToEnrollments','default','App',1776835414,7),(8,'2026-04-22-073841','App\\Database\\Migrations\\CreateBlogsTable','default','App',1776843546,8);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `modal_form_data`
--

DROP TABLE IF EXISTS `modal_form_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `modal_form_data` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_general_ci,
  `full_name` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `message` text COLLATE utf8mb4_general_ci NOT NULL,
  `course_id` int DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modal_form_data`
--

LOCK TABLES `modal_form_data` WRITE;
/*!40000 ALTER TABLE `modal_form_data` DISABLE KEYS */;
/*!40000 ALTER TABLE `modal_form_data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `query_forms`
--

DROP TABLE IF EXISTS `query_forms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `query_forms` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `query` text COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `query_forms`
--

LOCK TABLES `query_forms` WRITE;
/*!40000 ALTER TABLE `query_forms` DISABLE KEYS */;
/*!40000 ALTER TABLE `query_forms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `start_your_cma_journey_in_usa`
--

DROP TABLE IF EXISTS `start_your_cma_journey_in_usa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `start_your_cma_journey_in_usa` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `location` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `profession` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `start_your_cma_journey_in_usa`
--

LOCK TABLES `start_your_cma_journey_in_usa` WRITE;
/*!40000 ALTER TABLE `start_your_cma_journey_in_usa` DISABLE KEYS */;
/*!40000 ALTER TABLE `start_your_cma_journey_in_usa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_admins`
--

DROP TABLE IF EXISTS `tbl_admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_admins` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_admins`
--

LOCK TABLES `tbl_admins` WRITE;
/*!40000 ALTER TABLE `tbl_admins` DISABLE KEYS */;
INSERT INTO `tbl_admins` VALUES (1,'admin@gmail.com','$2y$10$xCOehk7/KcZHK78Sc0mDOevPPMGOSlKtY38x1hGGQ.skYbfiKefx2','2025-07-18 11:57:14','2025-08-18 10:10:20');
/*!40000 ALTER TABLE `tbl_admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_announcements`
--

DROP TABLE IF EXISTS `tbl_announcements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_announcements` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text,
  `target_type` enum('all','individual') DEFAULT 'all',
  `student_id` int DEFAULT NULL,
  `type` enum('info','warning','success','danger') DEFAULT 'info',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_announcements`
--

LOCK TABLES `tbl_announcements` WRITE;
/*!40000 ALTER TABLE `tbl_announcements` DISABLE KEYS */;
INSERT INTO `tbl_announcements` VALUES (1,'Live Q&A Session','Join Shivangani Ma\'am today at 6 PM for a Q&A on EA exams.','all',NULL,'info','2026-04-21 07:14:54'),(2,'Holiday Notice','Academy will be closed on April 25th for local holiday.','all',NULL,'warning','2026-04-21 07:14:54'),(3,'New Study Material','Updated CMA Part 2 study guides are now available in the portal.','all',NULL,'success','2026-04-21 07:14:54'),(4,'Exam Registration Open','Registration for June EA exam is now open. Register before May 1st.','all',NULL,'danger','2026-04-21 07:14:54'),(5,'this is a test','message','individual',2,'info','2026-04-22 05:12:34');
/*!40000 ALTER TABLE `tbl_announcements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_blogs`
--

DROP TABLE IF EXISTS `tbl_blogs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_blogs` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `content` text COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `author` varchar(100) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Admin',
  `status` enum('draft','published') COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'published',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_blogs`
--

LOCK TABLES `tbl_blogs` WRITE;
/*!40000 ALTER TABLE `tbl_blogs` DISABLE KEYS */;
INSERT INTO `tbl_blogs` VALUES (1,'5 Essential Tips for Mastering CMA and EA Exams','mastering-cma-ea-exams','<h2>Accelerate Your Career with These Proven Strategies</h2><p>Becoming a Certified Management Accountant (CMA) or an Enrolled Agent (EA) is a significant milestone in any accounting professional\'s career. However, the journey is often challenging. Here are five essential tips to help you succeed:</p><ul><li><strong>Create a Study Schedule:</strong> Consistency is key. Dedicate at least 15-20 hours a week to your studies.</li><li><strong>Understand the Concepts:</strong> Don\'t just memorize; understand the underlying principles of taxation and management accounting.</li><li><strong>Practice with Mock Exams:</strong> Familiarize yourself with the exam format and time constraints.</li><li><strong>Stay Updated:</strong> Tax laws and accounting standards change. Ensure you are using the most recent study materials.</li><li><strong>Believe in Yourself:</strong> A positive mindset can make all the difference during the exam.</li></ul><p>At Shivangani Tandon Academy, we provide the resources and mentorship you need to cross the finish line with confidence.</p>','public/uploads/blogs/demo-blog.png','Shivangani Tandon','published','2026-04-22 13:48:39','2026-04-22 13:48:39'),(2,'The Future of AI in Accounting: Friend or Foe?','ai-in-accounting-future','<h2>Embracing the Digital Transformation</h2><p>Artificial Intelligence is no longer a futuristic concept; it is actively reshaping the accounting industry. From automated bookkeeping to predictive analytics, AI is enabling accountants to shift from data entry to strategic advisory roles.</p><h3>Key Benefits:</h3><ul><li>Accuracy and Error Reduction</li><li>Real-time Financial Insights</li><li>Fraud Detection</li></ul><p>The successful accountant of tomorrow will be the one who knows how to leverage AI tools to provide deeper value to their clients.</p>','public/uploads/blogs/blog-ai.png','Shivangani Tandon','published','2026-04-22 14:02:29','2026-04-22 14:02:29'),(3,'Balancing Work, Life, and Professional Certifications','work-life-balance-certifications','<h2>How to Succeed Without Burning Out</h2><p>Preparing for exams like the CMA or EA while working full-time is a marathon, not a sprint. Maintaining your mental and physical health is just as important as your study hours.</p><h3>Practical Strategies:</h3><ul><li>The Pomodoro Technique for focused study</li><li>Setting boundaries with work and family</li><li>Rewarding yourself for small milestones</li></ul><p>Remember, a rested mind absorbs information much faster than an exhausted one.</p>','public/uploads/blogs/blog-balance.png','Shivangani Tandon','published','2026-04-22 14:02:29','2026-04-22 14:02:29'),(4,'US Taxation vs Indian Taxation: Key Differences','us-vs-indian-taxation','<h2>Understanding the Global Financial Landscape</h2><p>For professionals working with multinational corporations, understanding the nuances between US and Indian tax systems is crucial. While India follows a progressive income tax system, the US system has its own unique complexities like state taxes and FICA.</p><h3>Comparative Highlights:</h3><ul><li>Tax Residency Rules</li><li>Deductions and Exemptions</li><li>Corporate Tax Structures</li></ul><p>Mastering these differences opens doors to high-paying roles in international consulting firm.</p>','public/uploads/blogs/blog-global-tax.png','Shivangani Tandon','published','2026-04-22 14:02:29','2026-04-22 14:02:29'),(5,'Why CMA USA is the Gold Standard for Accountants','cma-usa-gold-standard','<h2>Elevate Your Professional Standing</h2><p>The Certified Management Accountant (CMA) credential from the USA is recognized globally as the gold standard in management accounting. It validates your expertise in financial planning, analysis, control, and decision support.</p><h3>Why Choose CMA USA?</h3><ul><li>Global Career Mobility in 150+ countries</li><li>Higher Earning Potential (average 30% increase)</li><li>Networking with 100,000+ IMA members</li></ul><p>Join our upcoming batch to start your journey toward this prestigious certification.</p>','public/uploads/blogs/blog-cma-gold.png','Shivangani Tandon','published','2026-04-22 14:04:11','2026-04-22 14:04:11'),(6,'Top 10 High-Paying Careers in Global Finance for 2026','high-paying-finance-careers-2026','<h2>Future-Proof Your Career</h2><p>The finance industry is evolving rapidly. As we look toward 2026, certain roles are standing out for their high demand and exceptional compensation packages.</p><h3>The Most In-Demand Roles:</h3><ol><li>Risk Management Specialist</li><li>Global Tax Consultant (EA)</li><li>Financial Controller (CMA)</li><li>Data Analytics Manager</li><li>ESG Financial Advisor</li></ol><p>Our curriculum is specifically designed to prepare you for these elite career paths by focusing on the skills that international employers value most.</p>','public/uploads/blogs/blog-finance-careers.png','Shivangani Tandon','published','2026-04-22 14:04:11','2026-04-22 14:04:11'),(7,'Navigating the 2026 US Tax Season','us-tax-season-2026-guide','<h2>Prepare for the Most Complex Tax Season Yet</h2><p>With new legislative changes taking effect in 2026, small businesses and individual taxpayers need to be more vigilant than ever. Understanding the latest credits and deductions is key to maximizing your return.</p><h3>Key Focus Areas:</h3><ul><li>New R&D Credit Provisions</li><li>Updated Section 179 Expensing Limits</li><li>Changes in Electronic Filing Requirements</li></ul><p>Our Enrolled Agent (EA) program specifically covers these updates to ensure our students are industry-ready.</p>','public/uploads/blogs/blog-tax-2026.png','Shivangani Tandon','published','2026-04-22 14:19:08','2026-04-22 14:19:08'),(8,'The Rise of Remote Auditing and Cloud Tech','remote-auditing-cloud-innovation','<h2>Auditing in the Age of Virtual Connectivity</h2><p>The traditional site-visit audit is evolving. Today, auditors are leveraging cloud-based platforms and even VR to conduct thorough reviews from across the globe. This shift is increasing efficiency and reducing overhead costs.</p><h3>Technological Pillars:</h3><ul><li>Blockchain for Immutable Ledgers</li><li>Cloud-Based Audit Workpapers</li><li>Secure Data Room Collaboration</li></ul><p>Staying ahead of these technological trends is what sets Shivangani Tandon Academy alumni apart in the global job market.</p>','public/uploads/blogs/blog-remote-audit.png','Shivangani Tandon','published','2026-04-22 14:19:08','2026-04-22 14:19:08');
/*!40000 ALTER TABLE `tbl_blogs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_courses`
--

DROP TABLE IF EXISTS `tbl_courses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_courses` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text,
  `duration` varchar(50) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_courses`
--

LOCK TABLES `tbl_courses` WRITE;
/*!40000 ALTER TABLE `tbl_courses` DISABLE KEYS */;
INSERT INTO `tbl_courses` VALUES (1,'EA Course - Enrolled Agent','Comprehensive training for EA exams.','6 Months','ea_course.jpg','2026-04-21 07:14:54'),(2,'CMA Part 1 - Financial Planning','Master corporate finance and strategy.','4 Months','cma_p1.jpg','2026-04-21 07:14:54'),(3,'US Tax Basics','Introductory course for US tax laws.','2 Months','tax_basics.jpg','2026-04-21 07:14:54');
/*!40000 ALTER TABLE `tbl_courses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_enrollments`
--

DROP TABLE IF EXISTS `tbl_enrollments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_enrollments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `course_id` int NOT NULL,
  `progress` int DEFAULT '0',
  `status` enum('pending','enrolled','in-progress','completed','rejected','suspended') DEFAULT 'pending',
  `message` text,
  `enrolled_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_enrollments`
--

LOCK TABLES `tbl_enrollments` WRITE;
/*!40000 ALTER TABLE `tbl_enrollments` DISABLE KEYS */;
INSERT INTO `tbl_enrollments` VALUES (4,2,2,0,'in-progress','kvhskhvsjh xfhwfb','2026-04-22 04:53:27');
/*!40000 ALTER TABLE `tbl_enrollments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_exam_questions`
--

DROP TABLE IF EXISTS `tbl_exam_questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_exam_questions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `lesson_id` int NOT NULL,
  `question_text` text NOT NULL,
  `options` text,
  `correct_option` varchar(255) DEFAULT NULL,
  `question_type` enum('mcq','text') DEFAULT 'mcq',
  `points` int DEFAULT '1',
  `question_paper` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `lesson_id` (`lesson_id`),
  CONSTRAINT `tbl_exam_questions_ibfk_1` FOREIGN KEY (`lesson_id`) REFERENCES `tbl_lessons` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_exam_questions`
--

LOCK TABLES `tbl_exam_questions` WRITE;
/*!40000 ALTER TABLE `tbl_exam_questions` DISABLE KEYS */;
INSERT INTO `tbl_exam_questions` VALUES (1,3,'this is test qustion','[\"op1\",\"op2\",\"op3\",\"op4\"]','op2','mcq',1,NULL,'2026-04-21 10:53:46'),(2,3,'this is the test qustion 2','[\"op1\",\"op2\",\"op2\",\"op4\"]','op2','mcq',1,NULL,'2026-04-21 10:54:46'),(3,4,'this is the exem 1','[\"\",\"\",\"\",\"\"]','','text',10,NULL,'2026-04-21 11:17:39');
/*!40000 ALTER TABLE `tbl_exam_questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_exam_submissions`
--

DROP TABLE IF EXISTS `tbl_exam_submissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_exam_submissions` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int unsigned NOT NULL,
  `course_id` int unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `type` enum('quiz','exam') COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'quiz',
  `answers` text COLLATE utf8mb4_general_ci,
  `file_path` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` enum('pending','graded') COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'pending',
  `score` decimal(5,2) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_exam_submissions`
--

LOCK TABLES `tbl_exam_submissions` WRITE;
/*!40000 ALTER TABLE `tbl_exam_submissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_exam_submissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_lesson_progress`
--

DROP TABLE IF EXISTS `tbl_lesson_progress`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_lesson_progress` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int unsigned NOT NULL,
  `course_id` int unsigned NOT NULL,
  `lesson_id` int unsigned NOT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id_lesson_id` (`user_id`,`lesson_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_lesson_progress`
--

LOCK TABLES `tbl_lesson_progress` WRITE;
/*!40000 ALTER TABLE `tbl_lesson_progress` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_lesson_progress` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_lesson_resources`
--

DROP TABLE IF EXISTS `tbl_lesson_resources`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_lesson_resources` (
  `id` int NOT NULL AUTO_INCREMENT,
  `lesson_id` int NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_type` varchar(50) DEFAULT NULL,
  `file_path` varchar(255) NOT NULL,
  `file_size` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_lesson_resources`
--

LOCK TABLES `tbl_lesson_resources` WRITE;
/*!40000 ALTER TABLE `tbl_lesson_resources` DISABLE KEYS */;
INSERT INTO `tbl_lesson_resources` VALUES (1,1,'test resorase','PDF','public/uploads/resources/1776765343_8b81fb61d49eeb6d757f.pdf','26.89 MB','2026-04-21 09:55:43');
/*!40000 ALTER TABLE `tbl_lesson_resources` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_lessons`
--

DROP TABLE IF EXISTS `tbl_lessons`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_lessons` (
  `id` int NOT NULL AUTO_INCREMENT,
  `course_id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text,
  `type` varchar(20) DEFAULT 'video',
  `video_id` varchar(100) DEFAULT NULL,
  `duration` varchar(50) DEFAULT NULL,
  `passing_score` int DEFAULT '0',
  `sort_order` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_lessons`
--

LOCK TABLES `tbl_lessons` WRITE;
/*!40000 ALTER TABLE `tbl_lessons` DISABLE KEYS */;
INSERT INTO `tbl_lessons` VALUES (1,1,'this is a test','this is test','video','OWZo_qqrQIU','1:04:24',0,1,'2026-04-21 04:14:29','2026-04-21 04:21:08'),(2,1,'test 2','hsdgjzkj gfwqgdjsdj fbdgd','video','OWZo_qqrQIU','1:04:24',0,3,'2026-04-21 04:27:24','2026-04-21 05:18:47'),(3,1,'this is quiz','this is the test quiz','quiz','','30',0,2,'2026-04-21 05:19:18','2026-04-21 23:09:29'),(4,1,'this is first exem','ggklhglk jgjgkgkjgj','exam','','45',0,4,'2026-04-21 05:31:55','2026-04-21 23:09:41');
/*!40000 ALTER TABLE `tbl_lessons` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_results`
--

DROP TABLE IF EXISTS `tbl_results`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_results` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `subject` varchar(255) NOT NULL,
  `score` int NOT NULL,
  `total_points` int DEFAULT '100',
  `exam_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_results`
--

LOCK TABLES `tbl_results` WRITE;
/*!40000 ALTER TABLE `tbl_results` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_results` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_scores`
--

DROP TABLE IF EXISTS `tbl_scores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_scores` (
  `id` int NOT NULL AUTO_INCREMENT,
  `image` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_scores`
--

LOCK TABLES `tbl_scores` WRITE;
/*!40000 ALTER TABLE `tbl_scores` DISABLE KEYS */;
INSERT INTO `tbl_scores` VALUES (2,'1.jpg','2026-04-16 06:54:04'),(3,'3.jpg','2026-04-16 06:54:04'),(4,'4.jpg','2026-04-16 06:54:04'),(5,'5.jpg','2026-04-16 06:54:04'),(6,'6.jpg','2026-04-16 06:54:04'),(7,'7.jpg','2026-04-16 06:54:04'),(8,'8.jpg','2026-04-16 06:54:04'),(9,'9.jpg','2026-04-16 06:54:04'),(10,'10.jpg','2026-04-16 06:54:04'),(11,'11.jpg','2026-04-16 06:54:04'),(12,'12.jpg','2026-04-16 06:54:04'),(13,'13.jpg','2026-04-16 06:54:04'),(14,'14.jpg','2026-04-16 06:54:04'),(15,'15.jpg','2026-04-16 06:54:04');
/*!40000 ALTER TABLE `tbl_scores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_settings`
--

DROP TABLE IF EXISTS `tbl_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_settings` (
  `id` int NOT NULL AUTO_INCREMENT,
  `key_name` varchar(100) NOT NULL,
  `key_value` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `key_name` (`key_name`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_settings`
--

LOCK TABLES `tbl_settings` WRITE;
/*!40000 ALTER TABLE `tbl_settings` DISABLE KEYS */;
INSERT INTO `tbl_settings` VALUES (1,'director_signature','public/images/uploads/signatures/demo_signature.png','2026-04-21 07:50:04','2026-04-22 09:33:13'),(2,'site_name','Shivangani Tandon Academy','2026-04-22 04:00:42','2026-04-22 04:02:29'),(3,'site_email','info@shivanganitandon.com','2026-04-22 04:00:42','2026-04-22 04:02:29'),(4,'site_phone','+917483279284','2026-04-22 04:00:42','2026-04-22 04:02:29'),(5,'site_address','','2026-04-22 04:00:42','2026-04-22 04:02:29'),(6,'facebook_url','https://www.facebook.com/EnrolledAgentshivanganitandon','2026-04-22 04:00:42','2026-04-22 04:02:29'),(7,'instagram_url','https://www.instagram.com/shivanganitandonacademy/?hl=en','2026-04-22 04:00:42','2026-04-22 04:02:29'),(8,'linkedin_url','https://www.linkedin.com/company/shivanganitandon-academy/','2026-04-22 04:00:42','2026-04-22 04:02:29'),(9,'youtube_url','https://www.youtube.com/@shivanganitandonacademy9323','2026-04-22 04:00:42','2026-04-22 04:02:29');
/*!40000 ALTER TABLE `tbl_settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_students`
--

DROP TABLE IF EXISTS `tbl_students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_students` (
  `id` int NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `course_enrolled` varchar(255) DEFAULT 'EA Course',
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_students`
--

LOCK TABLES `tbl_students` WRITE;
/*!40000 ALTER TABLE `tbl_students` DISABLE KEYS */;
INSERT INTO `tbl_students` VALUES (1,'John Doe','student@gmail.com','9876543210','$2y$10$76SAvf/z7xtYdd5o1PvtqugO.xS0uc593oe6JBpyspJzD9W6VH.sS','EA Course','active','2026-04-21 06:59:54','2026-04-21 06:59:54');
/*!40000 ALTER TABLE `tbl_students` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_support_messages`
--

DROP TABLE IF EXISTS `tbl_support_messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_support_messages` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `support_request_id` int unsigned NOT NULL,
  `sender_id` int unsigned NOT NULL,
  `sender_role` enum('student','admin') NOT NULL,
  `message` text NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `support_request_id` (`support_request_id`),
  KEY `sender_id` (`sender_id`),
  CONSTRAINT `tbl_support_messages_ibfk_1` FOREIGN KEY (`support_request_id`) REFERENCES `tbl_support_requests` (`id`) ON DELETE CASCADE,
  CONSTRAINT `tbl_support_messages_ibfk_2` FOREIGN KEY (`sender_id`) REFERENCES `tbl_users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_support_messages`
--

LOCK TABLES `tbl_support_messages` WRITE;
/*!40000 ALTER TABLE `tbl_support_messages` DISABLE KEYS */;
INSERT INTO `tbl_support_messages` VALUES (1,1,2,'student','hhvsdh l;k ercvbelgkfkvbh','2026-04-22 07:02:25'),(2,1,1,'admin','test','2026-04-22 07:13:04'),(3,1,1,'admin','hello','2026-04-22 12:47:14'),(4,1,2,'student','hi','2026-04-22 12:47:29');
/*!40000 ALTER TABLE `tbl_support_messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_support_requests`
--

DROP TABLE IF EXISTS `tbl_support_requests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_support_requests` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int unsigned NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `admin_reply` text,
  `status` enum('pending','replied','closed') DEFAULT 'pending',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `tbl_support_requests_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_support_requests`
--

LOCK TABLES `tbl_support_requests` WRITE;
/*!40000 ALTER TABLE `tbl_support_requests` DISABLE KEYS */;
INSERT INTO `tbl_support_requests` VALUES (1,2,'I want help in this ','hhvsdh l;k ercvbelgkfkvbh','hello','closed','2026-04-22 07:02:25','2026-04-22 07:18:06');
/*!40000 ALTER TABLE `tbl_support_requests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_testimonials`
--

DROP TABLE IF EXISTS `tbl_testimonials`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_testimonials` (
  `id` int NOT NULL AUTO_INCREMENT,
  `student_name` varchar(255) NOT NULL,
  `youtube_id` varchar(100) NOT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_testimonials`
--

LOCK TABLES `tbl_testimonials` WRITE;
/*!40000 ALTER TABLE `tbl_testimonials` DISABLE KEYS */;
INSERT INTO `tbl_testimonials` VALUES (1,'Mustafa Moomin','zMBCf3PKSaA','public/images/EA/AboutCampushistory/1.png','2026-04-22 15:17:11','2026-04-22 15:17:11'),(3,'Bhabagrahi Jena','emUgLHYXA50','public/images/EA/AboutCampushistory/3.png','2026-04-22 15:17:11','2026-04-22 15:17:11'),(4,'Akshay Trivedi','uZmibYPyihg','public/images/EA/AboutCampushistory/4.png','2026-04-22 15:17:11','2026-04-22 15:17:11'),(5,'Anmol Parmeshwar','7JEoXfOcxLc','public/images/EA/AboutCampushistory/5.png','2026-04-22 15:17:11','2026-04-22 15:17:11');
/*!40000 ALTER TABLE `tbl_testimonials` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_users`
--

DROP TABLE IF EXISTS `tbl_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `profile_pic` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_users`
--

LOCK TABLES `tbl_users` WRITE;
/*!40000 ALTER TABLE `tbl_users` DISABLE KEYS */;
INSERT INTO `tbl_users` VALUES (1,'test user','testuser@gmail.com','1234567890','$2y$10$HujBdSsV.UVAmLGZXjzoJ.bK7b7B0nBCTqsDpRV4UpVPo5ba6xtMq',NULL,'2026-04-21 01:38:18','2026-04-21 07:08:18'),(2,'Sahil Laskar','student@gmail.com','9876543210','$2y$10$ywdA9LunFZo5OQw5q82/ne.LYnNyhqZ3CRCCRJgkl2CazHmJKfL6m','public/images/uploads/profiles/1776756680_b71112c1c207af585dca.png','2026-04-21 07:14:54','2026-04-21 07:31:26');
/*!40000 ALTER TABLE `tbl_users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-04-22 16:29:53
