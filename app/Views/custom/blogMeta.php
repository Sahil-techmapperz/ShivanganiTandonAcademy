<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-C9Z4T62C9L"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-C9Z4T62C9L');
    </script>
    
    <?php
    // Dynamically calculate metadata for sharing
    $blog_title = esc($blog['title'] ?? 'Top Rated US Tax Expert | EA Course, CMA & Tax Software Training');
    
    // Strip HTML and truncate content for a clean description snippet
    $raw_content = strip_tags($blog['content'] ?? '');
    $raw_content = preg_replace('/\s+/', ' ', $raw_content);
    $blog_desc = mb_strimwidth(trim($raw_content), 0, 155, "...");
    if (empty($blog_desc)) {
        $blog_desc = "Start your Global Tax career with us. Expert-led EA exam prep, US CMA taxation course, Tax software & AI skills training.";
    }
    $blog_desc = esc($blog_desc);
    
    $blog_url = base_url('blog/' . ($blog['slug'] ?? ''));
    $blog_image = isset($blog['image']) && !empty($blog['image']) ? base_url($blog['image']) : base_url('public/images/commonImages/SivanganiTandon12.jpg');
    ?>

    <link rel="canonical" href="<?= $blog_url ?>" />

    <!-- Basic Meta -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= $blog_title ?> | Shivangani Tandon Academy</title>
    <!-- SEO Meta -->
    <meta name="description" content="<?= $blog_desc ?>">
    <meta name="author" content="<?= esc($blog['author'] ?? 'Shivangani Tandon') ?>">
    <meta name="robots" content="index, follow">

    <!-- Open Graph / Facebook / LinkedIn / WhatsApp -->
    <meta property="og:type" content="article" />
    <meta property="og:title" content="<?= $blog_title ?>" />
    <meta property="og:description" content="<?= $blog_desc ?>" />
    <meta property="og:image" content="<?= $blog_image ?>" />
    <meta property="og:url" content="<?= $blog_url ?>" />
    <meta property="og:site_name" content="Shivangani Tandon Academy" />

    <!-- Twitter Cards -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="<?= $blog_title ?>" />
    <meta name="twitter:description" content="<?= $blog_desc ?>" />
    <meta name="twitter:image" content="<?= $blog_image ?>" />

    <!-- Favicon / Icons -->
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url('public/images/commonImages/SivanganiTandon12.jpg') ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('public/images/commonImages/SivanganiTandon12.jpg') ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url('public/images/commonImages/SivanganiTandon12.jpg') ?>">
    <meta name="theme-color" content="#FE002A">
