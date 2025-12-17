<?php
// Public proxy for the about page so /apropos.php works from the site root.
// This keeps URLs clean while the real view lives in /views/apropos.php
include __DIR__ . '/views/apropos.php';
