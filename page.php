<?php
$context = Timber::get_context();
$context['menu'] = new TimberMenu('Primary');
$context['menu_icons'] = ['fa-home','fa-hand-sparkles','fa-info-circle','fa-images','fa-map-marker-alt','fa-phone-alt'];
$context['cur_up'] = ['title' => 'Вверх','url' => '#home'];
$context['logo'] = ['dark' => get_stylesheet_directory_uri().'/images/logo.svg','href' => site_url(),'alt' => get_bloginfo('description')];
$context['button'] = ['serve' => ['title' => 'Заказать', 'href' => '#'], 'calc' => ['title'=> 'Рассчитать стоимость', 'href' => '#calculate-model'], 'phone' => ['title' => 'Заказать звонок', 'href' => '#phone-model']];
$context['home'] = get_section_home(2);
$context['service'] = get_section_serice(1);
$context['info'] = get_section_info(20);
$context['advant'] = get_section_advantages(3);
$context['award'] = get_section_slider(61);
$context['galwork'] = get_section_slider(63);
$context['trusted'] = get_section_slider(95);
$context['map'] = get_section_map(116);
$context['footer'] = get_section_footer();
Timber::render('template/page.twig', $context);