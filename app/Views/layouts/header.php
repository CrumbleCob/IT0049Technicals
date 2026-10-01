<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A simple daily task management system built with CodeIgniter 4.">
    <title><?= esc($title ?? 'Tasks for Today') ?> | Tasks for Today</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body>
<?php $path = trim(service('uri')->getPath(), '/'); ?>
<header class="site-header">
    <div class="container nav-wrap">
        <a class="brand" href="<?= site_url('/') ?>" aria-label="Tasks for Today home">
            <span class="brand-mark">T</span>
            <span>Tasks for Today</span>
        </a>
        <nav class="nav" aria-label="Main navigation">
            <a class="<?= $path === '' ? 'active' : '' ?>" href="<?= site_url('/') ?>">Today</a>
            <a class="<?= $path === 'tasks' ? 'active' : '' ?>" href="<?= site_url('tasks') ?>">All Tasks</a>
            <a class="<?= $path === 'profile' ? 'active' : '' ?>" href="<?= site_url('profile') ?>">Profile</a>
            <a class="<?= $path === 'about' ? 'active' : '' ?>" href="<?= site_url('about') ?>">About</a>
        </nav>
    </div>
</header>
<main class="container page-shell">
