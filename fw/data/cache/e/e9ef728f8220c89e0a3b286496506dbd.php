<?php
defined('_ROOT') or die('Not Allowed');
$sql = "SELECT * FROM php_configure_mod WHERE 1 ORDER BY `module`,typeid";
$num = "0";
$data = 'a:4:{i:0;a:5:{s:6:\"module\";s:7:\"content\";s:6:\"typeid\";s:1:\"1\";s:4:\"name\";s:13:\"jquery manual\";s:7:\"content\";s:0:\"\";s:4:\"data\";s:6019:\"a:57:{s:3:\"act\";a:10:{i:0;s:13:\"enable_editor\";i:1;s:3:\"new\";i:2;s:6:\"update\";i:3;s:6:\"delete\";i:4;s:6:\"newcat\";i:5;s:9:\"updatecat\";i:6;s:9:\"deletecat\";i:7;s:7:\"viewcat\";i:8;s:12:\"drapdrop_cat\";i:9;s:14:\"enable_catdate\";}s:6:\"button\";a:19:{s:4:\"root\";s:0:\"\";s:11:\"header_name\";s:0:\"\";s:11:\"header_date\";s:0:\"\";s:12:\"header_order\";s:0:\"\";s:13:\"header_status\";s:0:\"\";s:14:\"header_actions\";s:0:\"\";s:10:\"tools_copy\";s:0:\"\";s:8:\"new_item\";s:0:\"\";s:9:\"edit_item\";s:0:\"\";s:11:\"delete_item\";s:0:\"\";s:9:\"move_item\";s:0:\"\";s:11:\"active_item\";s:0:\"\";s:13:\"inactive_item\";s:0:\"\";s:17:\"status_hover_item\";s:0:\"\";s:12:\"new_category\";s:0:\"\";s:13:\"edit_category\";s:0:\"\";s:15:\"delete_category\";s:0:\"\";s:15:\"new_subcategory\";s:0:\"\";s:16:\"status_hover_cat\";s:0:\"\";}s:12:\"comment_name\";s:0:\"\";s:15:\"featuredon_name\";s:0:\"\";s:12:\"sort_default\";s:8:\"order_id\";s:18:\"sort_default_order\";s:0:\"\";s:9:\"languages\";s:1:\"0\";s:10:\"extra_sort\";s:0:\"\";s:11:\"main_fields\";a:3:{s:4:\"home\";a:7:{s:4:\"name\";s:0:\"\";s:4:\"type\";s:5:\"input\";s:14:\"status_default\";s:1:\"0\";s:6:\"number\";s:1:\"0\";s:11:\"description\";s:0:\"\";s:11:\"require_msg\";s:0:\"\";s:9:\"sortorder\";s:1:\"0\";}s:3:\"top\";a:7:{s:4:\"name\";s:0:\"\";s:4:\"type\";s:5:\"input\";s:14:\"status_default\";s:1:\"0\";s:6:\"number\";s:1:\"0\";s:11:\"description\";s:0:\"\";s:11:\"require_msg\";s:0:\"\";s:9:\"sortorder\";s:1:\"0\";}s:2:\"ym\";a:7:{s:4:\"name\";s:0:\"\";s:4:\"type\";s:5:\"input\";s:14:\"status_default\";s:1:\"0\";s:6:\"number\";s:1:\"0\";s:11:\"description\";s:0:\"\";s:11:\"require_msg\";s:0:\"\";s:9:\"sortorder\";s:1:\"0\";}}s:9:\"ln_fields\";a:3:{s:4:\"name\";a:6:{s:5:\"chose\";s:1:\"1\";s:4:\"name\";s:4:\"Name\";s:4:\"type\";s:5:\"input\";s:11:\"description\";s:0:\"\";s:11:\"require_msg\";s:0:\"\";s:9:\"sortorder\";s:1:\"0\";}s:5:\"intro\";a:6:{s:5:\"chose\";s:1:\"1\";s:4:\"name\";s:4:\"Desc\";s:4:\"type\";s:8:\"textarea\";s:11:\"description\";s:0:\"\";s:11:\"require_msg\";s:0:\"\";s:9:\"sortorder\";s:1:\"0\";}s:7:\"content\";a:6:{s:5:\"chose\";s:1:\"1\";s:4:\"name\";s:7:\"Example\";s:4:\"type\";s:7:\"tinymce\";s:11:\"description\";s:0:\"\";s:11:\"require_msg\";s:0:\"\";s:9:\"sortorder\";s:1:\"0\";}}s:7:\"options\";a:2:{i:0;s:1:\"1\";i:1;s:1:\"2\";}s:12:\"options_type\";a:2:{i:1;s:1:\"0\";i:2;s:1:\"1\";}s:18:\"options_save_field\";a:2:{i:1;s:0:\"\";i:2;s:0:\"\";}s:10:\"file_extra\";a:4:{s:4:\"name\";a:1:{i:0;s:3:\"PDF\";}s:4:\"code\";a:1:{i:0;s:3:\"pdf\";}s:4:\"type\";a:1:{i:0;s:4:\".pdf\";}s:4:\"note\";a:1:{i:0;s:26:\"Upload file pdf ko qua 2Mb\";}}s:8:\"tpl_view\";s:11:\"content.tpl\";s:10:\"tpl_update\";s:18:\"content.update.tpl\";s:13:\"rows_per_page\";s:0:\"\";s:9:\"nodel_ids\";s:2:\"-1\";s:11:\"thumb_field\";s:0:\"\";s:10:\"list_field\";s:0:\"\";s:10:\"sort_order\";s:0:\"\";s:9:\"main_icon\";a:6:{s:1:\"w\";s:1:\"0\";s:1:\"h\";s:1:\"0\";s:4:\"name\";s:0:\"\";s:12:\"force_resize\";s:4:\"true\";s:7:\"specify\";s:4:\"none\";s:7:\"orginal\";s:1:\"0\";}s:8:\"main_img\";a:6:{s:1:\"w\";s:1:\"0\";s:1:\"h\";s:1:\"0\";s:4:\"name\";s:0:\"\";s:12:\"force_resize\";s:4:\"true\";s:7:\"specify\";s:4:\"none\";s:7:\"orginal\";s:1:\"0\";}s:10:\"main_thumb\";a:4:{s:1:\"w\";s:1:\"0\";s:1:\"h\";s:1:\"0\";s:12:\"force_resize\";s:4:\"true\";s:7:\"specify\";s:4:\"none\";}s:12:\"ln_main_icon\";a:6:{s:1:\"w\";s:1:\"0\";s:1:\"h\";s:1:\"0\";s:4:\"name\";s:0:\"\";s:12:\"force_resize\";s:4:\"true\";s:7:\"specify\";s:4:\"none\";s:7:\"orginal\";s:1:\"0\";}s:11:\"ln_main_img\";a:6:{s:1:\"w\";s:1:\"0\";s:1:\"h\";s:1:\"0\";s:4:\"name\";s:0:\"\";s:12:\"force_resize\";s:4:\"true\";s:7:\"specify\";s:4:\"none\";s:7:\"orginal\";s:1:\"0\";}s:13:\"ln_main_thumb\";a:4:{s:1:\"w\";s:1:\"0\";s:1:\"h\";s:1:\"0\";s:12:\"force_resize\";s:4:\"true\";s:7:\"specify\";s:4:\"none\";}s:12:\"gallery_name\";s:0:\"\";s:12:\"gallery_sort\";s:6:\"id ASC\";s:14:\"gallery_fields\";s:0:\"\";s:12:\"gallery_icon\";a:6:{s:1:\"w\";s:1:\"0\";s:1:\"h\";s:1:\"0\";s:4:\"name\";s:0:\"\";s:12:\"force_resize\";s:4:\"true\";s:7:\"specify\";s:4:\"none\";s:7:\"orginal\";s:1:\"0\";}s:11:\"gallery_img\";a:7:{s:5:\"chose\";s:1:\"1\";s:1:\"w\";s:1:\"0\";s:1:\"h\";s:1:\"0\";s:4:\"name\";s:0:\"\";s:12:\"force_resize\";s:4:\"true\";s:7:\"specify\";s:4:\"none\";s:7:\"orginal\";s:1:\"0\";}s:13:\"gallery_thumb\";a:4:{s:1:\"w\";s:1:\"0\";s:1:\"h\";s:1:\"0\";s:12:\"force_resize\";s:4:\"true\";s:7:\"specify\";s:4:\"none\";}s:8:\"sub_name\";s:0:\"\";s:15:\"sub_show_fields\";s:0:\"\";s:13:\"cattpl_update\";s:19:\"category.update.tpl\";s:13:\"cat_languages\";s:1:\"0\";s:6:\"nlevel\";s:2:\"-1\";s:15:\"noproduct_level\";s:2:\"-1\";s:13:\"noproduct_cat\";s:2:\"-1\";s:14:\"nosubcat_level\";s:2:\"-1\";s:12:\"nosubcat_cat\";s:2:\"-1\";s:12:\"nodelcat_ids\";s:2:\"-1\";s:17:\"category_required\";s:0:\"\";s:13:\"list_catfield\";s:0:\"\";s:10:\"cat_fields\";a:2:{s:4:\"code\";a:5:{s:4:\"name\";s:0:\"\";s:4:\"type\";s:5:\"input\";s:11:\"description\";s:0:\"\";s:11:\"require_msg\";s:0:\"\";s:9:\"sortorder\";s:1:\"0\";}s:5:\"price\";a:5:{s:4:\"name\";s:0:\"\";s:4:\"type\";s:5:\"input\";s:11:\"description\";s:0:\"\";s:11:\"require_msg\";s:0:\"\";s:9:\"sortorder\";s:1:\"0\";}}s:12:\"ln_catfields\";a:2:{s:4:\"name\";a:6:{s:5:\"chose\";s:1:\"1\";s:4:\"name\";s:4:\"Name\";s:4:\"type\";s:5:\"input\";s:11:\"description\";s:0:\"\";s:11:\"require_msg\";s:0:\"\";s:9:\"sortorder\";s:1:\"0\";}s:5:\"intro\";a:5:{s:4:\"name\";s:0:\"\";s:4:\"type\";s:5:\"input\";s:11:\"description\";s:0:\"\";s:11:\"require_msg\";s:0:\"\";s:9:\"sortorder\";s:1:\"0\";}}s:13:\"catsort_order\";s:0:\"\";s:15:\"catoptions_type\";a:2:{i:1;s:1:\"0\";i:2;s:1:\"2\";}s:21:\"catoptions_save_field\";a:2:{i:1;s:0:\"\";i:2;s:0:\"\";}s:13:\"catfile_extra\";a:4:{s:4:\"name\";a:1:{i:0;s:8:\"Brochure\";}s:4:\"code\";a:1:{i:0;s:3:\"pdf\";}s:4:\"type\";a:1:{i:0;s:4:\".pdf\";}s:4:\"note\";a:1:{i:0;s:8:\"abc code\";}}s:11:\"catimg_icon\";a:6:{s:1:\"w\";s:1:\"0\";s:1:\"h\";s:1:\"0\";s:4:\"name\";s:0:\"\";s:12:\"force_resize\";s:4:\"true\";s:7:\"specify\";s:4:\"none\";s:7:\"orginal\";s:1:\"0\";}s:10:\"catimg_img\";a:6:{s:1:\"w\";s:1:\"0\";s:1:\"h\";s:1:\"0\";s:4:\"name\";s:0:\"\";s:12:\"force_resize\";s:4:\"true\";s:7:\"specify\";s:4:\"none\";s:7:\"orginal\";s:1:\"0\";}s:12:\"catimg_thumb\";a:4:{s:1:\"w\";s:1:\"0\";s:1:\"h\";s:1:\"0\";s:12:\"force_resize\";s:4:\"true\";s:7:\"specify\";s:4:\"none\";}s:14:\"ln_catimg_icon\";a:6:{s:1:\"w\";s:1:\"0\";s:1:\"h\";s:1:\"0\";s:4:\"name\";s:0:\"\";s:12:\"force_resize\";s:4:\"true\";s:7:\"specify\";s:4:\"none\";s:7:\"orginal\";s:1:\"0\";}s:13:\"ln_catimg_img\";a:6:{s:1:\"w\";s:1:\"0\";s:1:\"h\";s:1:\"0\";s:4:\"name\";s:0:\"\";s:12:\"force_resize\";s:4:\"true\";s:7:\"specify\";s:4:\"none\";s:7:\"orginal\";s:1:\"0\";}s:15:\"ln_catimg_thumb\";a:4:{s:1:\"w\";s:1:\"0\";s:1:\"h\";s:1:\"0\";s:12:\"force_resize\";s:4:\"true\";s:7:\"specify\";s:4:\"none\";}}\";}i:1;a:5:{s:6:\"module\";s:4:\"html\";s:6:\"typeid\";s:1:\"1\";s:4:\"name\";s:5:\"About\";s:7:\"content\";s:0:\"\";s:4:\"data\";s:2173:\"a:19:{s:9:\"languages\";s:1:\"0\";s:10:\"tpl_update\";s:15:\"html.update.tpl\";s:11:\"main_fields\";a:1:{s:4:\"code\";a:5:{s:4:\"name\";s:0:\"\";s:4:\"type\";s:5:\"input\";s:11:\"description\";s:0:\"\";s:11:\"require_msg\";s:0:\"\";s:9:\"sortorder\";s:1:\"0\";}}s:9:\"ln_fields\";a:2:{s:4:\"name\";a:6:{s:5:\"chose\";s:1:\"1\";s:4:\"name\";s:4:\"Name\";s:4:\"type\";s:5:\"input\";s:11:\"description\";s:0:\"\";s:11:\"require_msg\";s:0:\"\";s:9:\"sortorder\";s:1:\"0\";}s:7:\"content\";a:5:{s:4:\"name\";s:0:\"\";s:4:\"type\";s:5:\"input\";s:11:\"description\";s:0:\"\";s:11:\"require_msg\";s:0:\"\";s:9:\"sortorder\";s:1:\"0\";}}s:10:\"file_extra\";a:4:{s:4:\"name\";a:2:{i:0;s:3:\"PDF\";i:1;s:0:\"\";}s:4:\"code\";a:2:{i:0;s:3:\"pdf\";i:1;s:0:\"\";}s:4:\"type\";a:2:{i:0;s:4:\".pdf\";i:1;s:0:\"\";}s:4:\"note\";a:2:{i:0;s:4:\"eewr\";i:1;s:0:\"\";}}s:12:\"options_type\";a:2:{i:1;s:1:\"0\";i:2;s:1:\"1\";}s:18:\"options_save_field\";a:2:{i:1;s:0:\"\";i:2;s:0:\"\";}s:7:\"options\";a:1:{i:0;s:1:\"2\";}s:9:\"main_icon\";a:6:{s:1:\"w\";s:1:\"0\";s:1:\"h\";s:1:\"0\";s:4:\"name\";s:0:\"\";s:12:\"force_resize\";s:4:\"true\";s:7:\"specify\";s:4:\"none\";s:7:\"orginal\";s:1:\"0\";}s:8:\"main_img\";a:6:{s:1:\"w\";s:1:\"0\";s:1:\"h\";s:1:\"0\";s:4:\"name\";s:0:\"\";s:12:\"force_resize\";s:4:\"true\";s:7:\"specify\";s:4:\"none\";s:7:\"orginal\";s:1:\"0\";}s:10:\"main_thumb\";a:4:{s:1:\"w\";s:1:\"0\";s:1:\"h\";s:1:\"0\";s:12:\"force_resize\";s:4:\"true\";s:7:\"specify\";s:4:\"none\";}s:12:\"ln_main_icon\";a:6:{s:1:\"w\";s:1:\"0\";s:1:\"h\";s:1:\"0\";s:4:\"name\";s:0:\"\";s:12:\"force_resize\";s:4:\"true\";s:7:\"specify\";s:4:\"none\";s:7:\"orginal\";s:1:\"0\";}s:11:\"ln_main_img\";a:6:{s:1:\"w\";s:1:\"0\";s:1:\"h\";s:1:\"0\";s:4:\"name\";s:0:\"\";s:12:\"force_resize\";s:4:\"true\";s:7:\"specify\";s:4:\"none\";s:7:\"orginal\";s:1:\"0\";}s:13:\"ln_main_thumb\";a:4:{s:1:\"w\";s:1:\"0\";s:1:\"h\";s:1:\"0\";s:12:\"force_resize\";s:4:\"true\";s:7:\"specify\";s:4:\"none\";}s:12:\"gallery_name\";s:0:\"\";s:14:\"gallery_fields\";s:0:\"\";s:12:\"gallery_icon\";a:5:{s:1:\"w\";s:1:\"0\";s:1:\"h\";s:1:\"0\";s:12:\"force_resize\";s:4:\"true\";s:7:\"specify\";s:4:\"none\";s:7:\"orginal\";s:1:\"0\";}s:11:\"gallery_img\";a:6:{s:5:\"chose\";s:1:\"1\";s:1:\"w\";s:1:\"0\";s:1:\"h\";s:1:\"0\";s:12:\"force_resize\";s:4:\"true\";s:7:\"specify\";s:4:\"none\";s:7:\"orginal\";s:1:\"0\";}s:13:\"gallery_thumb\";a:4:{s:1:\"w\";s:1:\"0\";s:1:\"h\";s:1:\"0\";s:12:\"force_resize\";s:4:\"true\";s:7:\"specify\";s:4:\"none\";}}\";}i:2;a:5:{s:6:\"module\";s:7:\"options\";s:6:\"typeid\";s:1:\"1\";s:4:\"name\";s:7:\"version\";s:7:\"content\";s:0:\"\";s:4:\"data\";s:2872:\"a:25:{s:9:\"languages\";s:1:\"0\";s:8:\"tpl_view\";s:11:\"options.tpl\";s:10:\"tpl_update\";s:18:\"options.update.tpl\";s:12:\"sort_default\";s:8:\"order_id\";s:18:\"sort_default_order\";s:0:\"\";s:6:\"button\";a:13:{s:4:\"root\";s:0:\"\";s:11:\"header_name\";s:0:\"\";s:11:\"header_date\";s:0:\"\";s:12:\"header_order\";s:0:\"\";s:13:\"header_status\";s:0:\"\";s:14:\"header_actions\";s:0:\"\";s:10:\"tools_copy\";s:0:\"\";s:8:\"new_item\";s:0:\"\";s:9:\"edit_item\";s:0:\"\";s:11:\"delete_item\";s:0:\"\";s:11:\"active_item\";s:0:\"\";s:13:\"inactive_item\";s:0:\"\";s:17:\"status_hover_item\";s:0:\"\";}s:10:\"file_extra\";a:4:{s:4:\"name\";a:1:{i:0;s:3:\"PDF\";}s:4:\"code\";a:1:{i:0;s:3:\"pdf\";}s:4:\"type\";a:1:{i:0;s:4:\".pdf\";}s:4:\"note\";a:1:{i:0;s:5:\"oiwri\";}}s:11:\"main_fields\";a:2:{s:4:\"code\";a:5:{s:4:\"name\";s:0:\"\";s:4:\"type\";s:5:\"input\";s:11:\"description\";s:0:\"\";s:11:\"require_msg\";s:0:\"\";s:9:\"sortorder\";s:1:\"0\";}s:5:\"price\";a:5:{s:4:\"name\";s:0:\"\";s:4:\"type\";s:5:\"input\";s:11:\"description\";s:0:\"\";s:11:\"require_msg\";s:0:\"\";s:9:\"sortorder\";s:1:\"0\";}}s:9:\"ln_fields\";a:3:{s:4:\"name\";a:6:{s:5:\"chose\";s:1:\"1\";s:4:\"name\";s:4:\"Name\";s:4:\"type\";s:5:\"input\";s:11:\"description\";s:0:\"\";s:11:\"require_msg\";s:0:\"\";s:9:\"sortorder\";s:1:\"0\";}s:5:\"intro\";a:5:{s:4:\"name\";s:0:\"\";s:4:\"type\";s:5:\"input\";s:11:\"description\";s:0:\"\";s:11:\"require_msg\";s:0:\"\";s:9:\"sortorder\";s:1:\"0\";}s:7:\"content\";a:5:{s:4:\"name\";s:0:\"\";s:4:\"type\";s:5:\"input\";s:11:\"description\";s:0:\"\";s:11:\"require_msg\";s:0:\"\";s:9:\"sortorder\";s:1:\"0\";}}s:15:\"required_fields\";s:0:\"\";s:10:\"list_field\";s:0:\"\";s:10:\"sort_order\";s:0:\"\";s:9:\"main_icon\";a:6:{s:1:\"w\";s:1:\"0\";s:1:\"h\";s:1:\"0\";s:4:\"name\";s:0:\"\";s:12:\"force_resize\";s:4:\"true\";s:7:\"specify\";s:4:\"none\";s:7:\"orginal\";s:1:\"0\";}s:8:\"main_img\";a:6:{s:1:\"w\";s:1:\"0\";s:1:\"h\";s:1:\"0\";s:4:\"name\";s:0:\"\";s:12:\"force_resize\";s:4:\"true\";s:7:\"specify\";s:4:\"none\";s:7:\"orginal\";s:1:\"0\";}s:10:\"main_thumb\";a:4:{s:1:\"w\";s:1:\"0\";s:1:\"h\";s:1:\"0\";s:12:\"force_resize\";s:4:\"true\";s:7:\"specify\";s:4:\"none\";}s:12:\"ln_main_icon\";a:6:{s:1:\"w\";s:1:\"0\";s:1:\"h\";s:1:\"0\";s:4:\"name\";s:0:\"\";s:12:\"force_resize\";s:4:\"true\";s:7:\"specify\";s:4:\"none\";s:7:\"orginal\";s:1:\"0\";}s:11:\"ln_main_img\";a:6:{s:1:\"w\";s:1:\"0\";s:1:\"h\";s:1:\"0\";s:4:\"name\";s:0:\"\";s:12:\"force_resize\";s:4:\"true\";s:7:\"specify\";s:4:\"none\";s:7:\"orginal\";s:1:\"0\";}s:13:\"ln_main_thumb\";a:4:{s:1:\"w\";s:1:\"0\";s:1:\"h\";s:1:\"0\";s:12:\"force_resize\";s:4:\"true\";s:7:\"specify\";s:4:\"none\";}s:3:\"act\";a:1:{i:0;s:7:\"gallery\";}s:12:\"gallery_name\";s:0:\"\";s:12:\"gallery_sort\";s:6:\"id ASC\";s:14:\"gallery_fields\";s:0:\"\";s:12:\"gallery_icon\";a:5:{s:1:\"w\";s:1:\"0\";s:1:\"h\";s:1:\"0\";s:12:\"force_resize\";s:4:\"true\";s:7:\"specify\";s:4:\"none\";s:7:\"orginal\";s:1:\"0\";}s:11:\"gallery_img\";a:6:{s:5:\"chose\";s:1:\"1\";s:1:\"w\";s:1:\"0\";s:1:\"h\";s:1:\"0\";s:12:\"force_resize\";s:4:\"true\";s:7:\"specify\";s:4:\"none\";s:7:\"orginal\";s:1:\"0\";}s:13:\"gallery_thumb\";a:4:{s:1:\"w\";s:1:\"0\";s:1:\"h\";s:1:\"0\";s:12:\"force_resize\";s:4:\"true\";s:7:\"specify\";s:4:\"none\";}}\";}i:3;a:5:{s:6:\"module\";s:7:\"options\";s:6:\"typeid\";s:1:\"2\";s:4:\"name\";s:9:\"Data type\";s:7:\"content\";N;s:4:\"data\";s:2687:\"a:23:{s:9:\"languages\";s:1:\"0\";s:8:\"tpl_view\";s:11:\"options.tpl\";s:10:\"tpl_update\";s:18:\"options.update.tpl\";s:12:\"sort_default\";s:8:\"order_id\";s:18:\"sort_default_order\";s:0:\"\";s:6:\"button\";a:13:{s:4:\"root\";s:0:\"\";s:11:\"header_name\";s:0:\"\";s:11:\"header_date\";s:0:\"\";s:12:\"header_order\";s:0:\"\";s:13:\"header_status\";s:0:\"\";s:14:\"header_actions\";s:0:\"\";s:10:\"tools_copy\";s:0:\"\";s:8:\"new_item\";s:0:\"\";s:9:\"edit_item\";s:0:\"\";s:11:\"delete_item\";s:0:\"\";s:11:\"active_item\";s:0:\"\";s:13:\"inactive_item\";s:0:\"\";s:17:\"status_hover_item\";s:0:\"\";}s:11:\"main_fields\";a:2:{s:4:\"code\";a:5:{s:4:\"name\";s:0:\"\";s:4:\"type\";s:5:\"input\";s:11:\"description\";s:0:\"\";s:11:\"require_msg\";s:0:\"\";s:9:\"sortorder\";s:1:\"0\";}s:5:\"price\";a:5:{s:4:\"name\";s:0:\"\";s:4:\"type\";s:5:\"input\";s:11:\"description\";s:0:\"\";s:11:\"require_msg\";s:0:\"\";s:9:\"sortorder\";s:1:\"0\";}}s:9:\"ln_fields\";a:3:{s:4:\"name\";a:6:{s:5:\"chose\";s:1:\"1\";s:4:\"name\";s:4:\"Name\";s:4:\"type\";s:5:\"input\";s:11:\"description\";s:0:\"\";s:11:\"require_msg\";s:0:\"\";s:9:\"sortorder\";s:1:\"0\";}s:5:\"intro\";a:5:{s:4:\"name\";s:0:\"\";s:4:\"type\";s:5:\"input\";s:11:\"description\";s:0:\"\";s:11:\"require_msg\";s:0:\"\";s:9:\"sortorder\";s:1:\"0\";}s:7:\"content\";a:5:{s:4:\"name\";s:0:\"\";s:4:\"type\";s:5:\"input\";s:11:\"description\";s:0:\"\";s:11:\"require_msg\";s:0:\"\";s:9:\"sortorder\";s:1:\"0\";}}s:15:\"required_fields\";s:0:\"\";s:10:\"list_field\";s:0:\"\";s:10:\"sort_order\";s:0:\"\";s:9:\"main_icon\";a:6:{s:1:\"w\";s:1:\"0\";s:1:\"h\";s:1:\"0\";s:4:\"name\";s:0:\"\";s:12:\"force_resize\";s:4:\"true\";s:7:\"specify\";s:4:\"none\";s:7:\"orginal\";s:1:\"0\";}s:8:\"main_img\";a:6:{s:1:\"w\";s:1:\"0\";s:1:\"h\";s:1:\"0\";s:4:\"name\";s:0:\"\";s:12:\"force_resize\";s:4:\"true\";s:7:\"specify\";s:4:\"none\";s:7:\"orginal\";s:1:\"0\";}s:10:\"main_thumb\";a:4:{s:1:\"w\";s:1:\"0\";s:1:\"h\";s:1:\"0\";s:12:\"force_resize\";s:4:\"true\";s:7:\"specify\";s:4:\"none\";}s:12:\"ln_main_icon\";a:6:{s:1:\"w\";s:1:\"0\";s:1:\"h\";s:1:\"0\";s:4:\"name\";s:0:\"\";s:12:\"force_resize\";s:4:\"true\";s:7:\"specify\";s:4:\"none\";s:7:\"orginal\";s:1:\"0\";}s:11:\"ln_main_img\";a:6:{s:1:\"w\";s:1:\"0\";s:1:\"h\";s:1:\"0\";s:4:\"name\";s:0:\"\";s:12:\"force_resize\";s:4:\"true\";s:7:\"specify\";s:4:\"none\";s:7:\"orginal\";s:1:\"0\";}s:13:\"ln_main_thumb\";a:4:{s:1:\"w\";s:1:\"0\";s:1:\"h\";s:1:\"0\";s:12:\"force_resize\";s:4:\"true\";s:7:\"specify\";s:4:\"none\";}s:12:\"gallery_name\";s:0:\"\";s:12:\"gallery_sort\";s:6:\"id ASC\";s:14:\"gallery_fields\";s:0:\"\";s:12:\"gallery_icon\";a:5:{s:1:\"w\";s:1:\"0\";s:1:\"h\";s:1:\"0\";s:12:\"force_resize\";s:4:\"true\";s:7:\"specify\";s:4:\"none\";s:7:\"orginal\";s:1:\"0\";}s:11:\"gallery_img\";a:6:{s:5:\"chose\";s:1:\"1\";s:1:\"w\";s:1:\"0\";s:1:\"h\";s:1:\"0\";s:12:\"force_resize\";s:4:\"true\";s:7:\"specify\";s:4:\"none\";s:7:\"orginal\";s:1:\"0\";}s:13:\"gallery_thumb\";a:4:{s:1:\"w\";s:1:\"0\";s:1:\"h\";s:1:\"0\";s:12:\"force_resize\";s:4:\"true\";s:7:\"specify\";s:4:\"none\";}}\";}}';
?>