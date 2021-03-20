<?php
global $wp;

query_posts(['post_type' => $wp->query_vars['param']]);