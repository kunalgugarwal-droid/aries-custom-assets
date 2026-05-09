<?php
/**
 * Setup script for Aries Redesign Alternative v2 page
 * Run via: studio wp eval-file setup-page.php
 */

$site_url = get_option('siteurl');
$upload_dir = wp_upload_dir();
$upload_base = $upload_dir['baseurl'] . '/2026/05';

// 1. Register images in media library
$images = [
    'hero-background' => 'hero-background.png',
    'team-security' => 'team-security.png',
    'aries-logo' => 'aries-logo.png',
];
$attachment_ids = [];
foreach ($images as $key => $filename) {
    $filepath = $upload_dir['basedir'] . '/2026/05/' . $filename;
    if (!file_exists($filepath)) { echo "Missing: $filepath\n"; continue; }
    $filetype = wp_check_filetype($filename);
    $att_id = wp_insert_attachment([
        'post_mime_type' => $filetype['type'],
        'post_title' => $key,
        'post_status' => 'inherit',
    ], $filepath);
    require_once(ABSPATH . 'wp-admin/includes/image.php');
    $meta = wp_generate_attachment_metadata($att_id, $filepath);
    wp_update_attachment_metadata($att_id, $meta);
    $attachment_ids[$key] = $att_id;
    echo "Uploaded $key as attachment #$att_id\n";
}

$hero_url = $upload_base . '/hero-background.png';
$team_url = $upload_base . '/team-security.png';
$logo_url = $upload_base . '/aries-logo.png';
$hero_id = $attachment_ids['hero-background'] ?? 0;
$team_id = $attachment_ids['team-security'] ?? 0;
$logo_id = $attachment_ids['aries-logo'] ?? 0;

// 2. Create the page
$page_id = wp_insert_post([
    'post_title' => 'Aries Redesign Alternative v2',
    'post_status' => 'publish',
    'post_type' => 'page',
    'post_content' => '',
]);
echo "Created page #$page_id\n";

// 3. Set Elementor meta
update_post_meta($page_id, '_elementor_edit_mode', 'builder');
update_post_meta($page_id, '_elementor_template_type', 'wp-page');
update_post_meta($page_id, '_elementor_version', '4.0.7');
update_post_meta($page_id, '_wp_page_template', 'elementor_canvas');

// 4. Build Elementor JSON data
$data = [];

// --- SECTION 1: HEADER ---
$data[] = [
    'id' => 'hdr_' . wp_rand(),
    'elType' => 'section',
    'settings' => [
        'content_width' => 'boxed',
        'background_background' => 'classic',
        'background_color' => '#ffffff',
        'padding' => ['unit'=>'px','top'=>'15','right'=>'0','bottom'=>'15','left'=>'0','isLinked'=>false],
    ],
    'elements' => [
        [
            'id' => 'hdr_c1_' . wp_rand(),
            'elType' => 'column',
            'settings' => ['_column_size'=>30,'_inline_size'=>30],
            'elements' => [
                [
                    'id' => 'logo_' . wp_rand(),
                    'elType' => 'widget',
                    'widgetType' => 'image',
                    'settings' => [
                        'image' => ['url'=>$logo_url,'id'=>$logo_id],
                        'image_size' => 'medium',
                        'width' => ['unit'=>'px','size'=>180],
                    ],
                    'elements' => [],
                ],
            ],
            'isInner' => false,
        ],
        [
            'id' => 'hdr_c2_' . wp_rand(),
            'elType' => 'column',
            'settings' => ['_column_size'=>50,'_inline_size'=>50],
            'elements' => [
                [
                    'id' => 'nav_' . wp_rand(),
                    'elType' => 'widget',
                    'widgetType' => 'text-editor',
                    'settings' => [
                        'editor' => '<p style="text-align:right;margin-top:15px;"><a href="#" style="color:#222222;text-decoration:none;margin:0 18px;font-weight:500;font-size:15px;">Home</a><a href="#" style="color:#222222;text-decoration:none;margin:0 18px;font-weight:500;font-size:15px;">Services</a><a href="#" style="color:#222222;text-decoration:none;margin:0 18px;font-weight:500;font-size:15px;">About</a><a href="#" style="color:#222222;text-decoration:none;margin:0 18px;font-weight:500;font-size:15px;">Contact</a></p>',
                    ],
                    'elements' => [],
                ],
            ],
            'isInner' => false,
        ],
        [
            'id' => 'hdr_c3_' . wp_rand(),
            'elType' => 'column',
            'settings' => ['_column_size'=>20,'_inline_size'=>20],
            'elements' => [
                [
                    'id' => 'quote_btn_' . wp_rand(),
                    'elType' => 'widget',
                    'widgetType' => 'button',
                    'settings' => [
                        'text' => 'GET A QUOTE',
                        'align' => 'right',
                        'background_color' => '#c91c1c',
                        'button_text_color' => '#ffffff',
                        'typography_typography' => 'custom',
                        'typography_font_weight' => '600',
                        'typography_font_size' => ['unit'=>'px','size'=>14],
                        'border_radius' => ['unit'=>'px','top'=>4,'right'=>4,'bottom'=>4,'left'=>4,'isLinked'=>true],
                    ],
                    'elements' => [],
                ],
            ],
            'isInner' => false,
        ],
    ],
    'isInner' => false,
];

// --- SECTION 2: HERO ---
$data[] = [
    'id' => 'hero_' . wp_rand(),
    'elType' => 'section',
    'settings' => [
        'content_width' => 'boxed',
        'min_height' => ['unit'=>'vh','size'=>85],
        'background_background' => 'classic',
        'background_image' => ['url'=>$hero_url,'id'=>$hero_id],
        'background_position' => 'center center',
        'background_size' => 'cover',
        'background_overlay_background' => 'classic',
        'background_overlay_color' => 'rgba(0,0,0,0.55)',
        'padding' => ['unit'=>'px','top'=>'120','right'=>'20','bottom'=>'120','left'=>'20','isLinked'=>false],
    ],
    'elements' => [
        [
            'id' => 'hero_col_' . wp_rand(),
            'elType' => 'column',
            'settings' => ['_column_size'=>100],
            'elements' => [
                [
                    'id' => 'hero_h_' . wp_rand(),
                    'elType' => 'widget',
                    'widgetType' => 'heading',
                    'settings' => [
                        'title' => 'PROFESSIONAL SECURITY & PROTECTIVE SERVICES',
                        'align' => 'left',
                        'title_color' => '#ffffff',
                        'typography_typography' => 'custom',
                        'typography_font_family' => 'Inter',
                        'typography_font_weight' => '700',
                        'typography_font_size' => ['unit'=>'px','size'=>52],
                        'typography_line_height' => ['unit'=>'em','size'=>1.15],
                    ],
                    'elements' => [],
                ],
                [
                    'id' => 'hero_sub_' . wp_rand(),
                    'elType' => 'widget',
                    'widgetType' => 'heading',
                    'settings' => [
                        'title' => 'EX-LAW ENFORCEMENT & VETERANS. RELIABLE SOLUTIONS FOR YOUR SAFETY.',
                        'header_size' => 'h3',
                        'align' => 'left',
                        'title_color' => '#ffffff',
                        'typography_typography' => 'custom',
                        'typography_font_family' => 'Inter',
                        'typography_font_weight' => '600',
                        'typography_font_size' => ['unit'=>'px','size'=>20],
                        'margin' => ['unit'=>'px','top'=>'15','right'=>'0','bottom'=>'35','left'=>'0','isLinked'=>false],
                    ],
                    'elements' => [],
                ],
                [
                    'id' => 'hero_btns_' . wp_rand(),
                    'elType' => 'section',
                    'isInner' => true,
                    'settings' => ['content_width'=>'full','gap'=>'no'],
                    'elements' => [
                        [
                            'id' => 'hb1c_' . wp_rand(),
                            'elType' => 'column',
                            'isInner' => true,
                            'settings' => ['_column_size'=>50,'_inline_size'=>25],
                            'elements' => [
                                [
                                    'id' => 'hb1_' . wp_rand(),
                                    'elType' => 'widget',
                                    'widgetType' => 'button',
                                    'settings' => [
                                        'text' => 'OUR SERVICES',
                                        'align' => 'left',
                                        'background_color' => '#c91c1c',
                                        'button_text_color' => '#ffffff',
                                        'typography_typography' => 'custom',
                                        'typography_font_weight' => '600',
                                        'border_radius' => ['unit'=>'px','top'=>4,'right'=>4,'bottom'=>4,'left'=>4,'isLinked'=>true],
                                    ],
                                    'elements' => [],
                                ],
                            ],
                        ],
                        [
                            'id' => 'hb2c_' . wp_rand(),
                            'elType' => 'column',
                            'isInner' => true,
                            'settings' => ['_column_size'=>50,'_inline_size'=>25],
                            'elements' => [
                                [
                                    'id' => 'hb2_' . wp_rand(),
                                    'elType' => 'widget',
                                    'widgetType' => 'button',
                                    'settings' => [
                                        'text' => 'CONTACT US',
                                        'align' => 'left',
                                        'background_color' => 'transparent',
                                        'button_text_color' => '#ffffff',
                                        'button_type' => 'info',
                                        'border_border' => 'solid',
                                        'border_width' => ['unit'=>'px','top'=>2,'right'=>2,'bottom'=>2,'left'=>2,'isLinked'=>true],
                                        'border_color' => '#ffffff',
                                        'typography_typography' => 'custom',
                                        'typography_font_weight' => '600',
                                        'border_radius' => ['unit'=>'px','top'=>4,'right'=>4,'bottom'=>4,'left'=>4,'isLinked'=>true],
                                    ],
                                    'elements' => [],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            'isInner' => false,
        ],
    ],
    'isInner' => false,
];

// Helper: service card
function make_service_card($icon, $title, $desc) {
    return [
        'id' => 'sc_' . wp_rand(),
        'elType' => 'column',
        'isInner' => true,
        'settings' => ['_column_size'=>25],
        'elements' => [
            ['id'=>'si_'.wp_rand(),'elType'=>'widget','widgetType'=>'icon','settings'=>['selected_icon'=>['value'=>$icon,'library'=>'fa-solid'],'primary_color'=>'#c91c1c','icon_size'=>['unit'=>'px','size'=>40],'align'=>'left'],'elements'=>[]],
            ['id'=>'sh_'.wp_rand(),'elType'=>'widget','widgetType'=>'heading','settings'=>['title'=>$title,'header_size'=>'h4','title_color'=>'#222222','typography_typography'=>'custom','typography_font_weight'=>'700','typography_font_size'=>['unit'=>'px','size'=>18]],'elements'=>[]],
            ['id'=>'st_'.wp_rand(),'elType'=>'widget','widgetType'=>'text-editor','settings'=>['editor'=>"<p>$desc</p>",'text_color'=>'#666666'],'elements'=>[]],
            ['id'=>'sl_'.wp_rand(),'elType'=>'widget','widgetType'=>'button','settings'=>['text'=>'LEARN MORE','button_type'=>'link','align'=>'left','button_text_color'=>'#c91c1c','typography_typography'=>'custom','typography_font_weight'=>'600','typography_font_size'=>['unit'=>'px','size'=>13]],'elements'=>[]],
        ],
    ];
}

// --- SECTION 3: SERVICES GRID 1 (4 columns) ---
$data[] = [
    'id' => 'svc1_' . wp_rand(),
    'elType' => 'section',
    'settings' => [
        'content_width' => 'boxed',
        'background_background' => 'classic',
        'background_color' => '#ffffff',
        'padding' => ['unit'=>'px','top'=>'80','right'=>'0','bottom'=>'40','left'=>'0','isLinked'=>false],
    ],
    'elements' => [
        [
            'id' => 'svc1h_col_' . wp_rand(),
            'elType' => 'column',
            'settings' => ['_column_size'=>100],
            'elements' => [
                ['id'=>'svc1h_'.wp_rand(),'elType'=>'widget','widgetType'=>'heading','settings'=>['title'=>'SCALABLE SECURITY SOLUTIONS','align'=>'center','title_color'=>'#222222','typography_typography'=>'custom','typography_font_weight'=>'700','typography_font_size'=>['unit'=>'px','size'=>36],'margin'=>['unit'=>'px','top'=>'0','right'=>'0','bottom'=>'50','left'=>'0','isLinked'=>false]],'elements'=>[]],
            ],
            'isInner' => false,
        ],
    ],
    'isInner' => false,
];

$data[] = [
    'id' => 'svc1g_' . wp_rand(),
    'elType' => 'section',
    'isInner' => false,
    'settings' => [
        'content_width' => 'boxed',
        'background_color' => '#ffffff',
        'padding' => ['unit'=>'px','top'=>'0','right'=>'0','bottom'=>'80','left'=>'0','isLinked'=>false],
    ],
    'elements' => [
        make_service_card('fas fa-shield-alt', 'EXECUTIVE PROTECTION', 'Our close-protection details are led by seasoned professionals with law enforcement and military backgrounds, ensuring discreet and effective security for executives and VIPs.'),
        make_service_card('fas fa-home', 'RESIDENTIAL SECURITY', 'Comprehensive home security assessments, patrol solutions, and 24/7 monitoring to safeguard your property and give you peace of mind.'),
        make_service_card('fas fa-fire', 'FIRE WATCH', 'Round-the-clock site monitoring by trained fire watch personnel ensuring compliance with local fire codes and protecting your assets from fire hazards.'),
        make_service_card('fas fa-id-badge', 'EVENT SECURITY', 'Customized crowd control, access management, and on-site security staffing tailored to events of any scale, from private gatherings to large venues.'),
    ],
];

// --- SECTION 4: SOLUTIONS GRID 2 (3x2) ---
function make_solution_card($icon, $title, $desc) {
    return [
        'id' => 'sol_' . wp_rand(),
        'elType' => 'column',
        'isInner' => true,
        'settings' => ['_column_size'=>33],
        'elements' => [
            ['id'=>'soi_'.wp_rand(),'elType'=>'widget','widgetType'=>'icon','settings'=>['selected_icon'=>['value'=>$icon,'library'=>'fa-solid'],'primary_color'=>'#c91c1c','icon_size'=>['unit'=>'px','size'=>36],'align'=>'left'],'elements'=>[]],
            ['id'=>'soh_'.wp_rand(),'elType'=>'widget','widgetType'=>'heading','settings'=>['title'=>$title,'header_size'=>'h4','title_color'=>'#222222','typography_typography'=>'custom','typography_font_weight'=>'700','typography_font_size'=>['unit'=>'px','size'=>17]],'elements'=>[]],
            ['id'=>'sot_'.wp_rand(),'elType'=>'widget','widgetType'=>'text-editor','settings'=>['editor'=>"<p>$desc</p>",'text_color'=>'#666666','typography_typography'=>'custom','typography_font_size'=>['unit'=>'px','size'=>14]],'elements'=>[]],
            ['id'=>'sol_'.wp_rand(),'elType'=>'widget','widgetType'=>'button','settings'=>['text'=>'LEARN MORE','button_type'=>'link','align'=>'left','button_text_color'=>'#c91c1c','typography_typography'=>'custom','typography_font_weight'=>'600','typography_font_size'=>['unit'=>'px','size'=>13]],'elements'=>[]],
        ],
    ];
}

$data[] = [
    'id' => 'sol_hdr_' . wp_rand(),
    'elType' => 'section',
    'settings' => [
        'content_width' => 'boxed',
        'background_background' => 'classic',
        'background_color' => '#ffffff',
        'padding' => ['unit'=>'px','top'=>'60','right'=>'0','bottom'=>'20','left'=>'0','isLinked'=>false],
    ],
    'elements' => [
        ['id'=>'sol_hc_'.wp_rand(),'elType'=>'column','settings'=>['_column_size'=>100],'elements'=>[
            ['id'=>'sol_h_'.wp_rand(),'elType'=>'widget','widgetType'=>'heading','settings'=>['title'=>'SCALABLE SECURITY SOLUTIONS','align'=>'center','title_color'=>'#222222','typography_typography'=>'custom','typography_font_weight'=>'700','typography_font_size'=>['unit'=>'px','size'=>36],'margin'=>['unit'=>'px','top'=>'0','right'=>'0','bottom'=>'40','left'=>'0','isLinked'=>false]],'elements'=>[]],
        ],'isInner'=>false],
    ],
    'isInner' => false,
];

// Row 1
$data[] = [
    'id' => 'sol_r1_' . wp_rand(),
    'elType' => 'section',
    'isInner' => false,
    'settings' => ['content_width'=>'boxed','padding'=>['unit'=>'px','top'=>'0','right'=>'0','bottom'=>'20','left'=>'0','isLinked'=>false]],
    'elements' => [
        make_solution_card('fas fa-shield-alt','Executive Protection','Our close-protection details provide discreet, professional security for corporate leaders and high-profile individuals around the clock.'),
        make_solution_card('fas fa-home','Residential Security','We deliver thorough home security assessments and patrol solutions designed to keep your family and property safe at all times.'),
        make_solution_card('fas fa-fire','Fire Watch','Trained fire watch personnel provide round-the-clock site monitoring, ensuring full compliance with fire safety codes and regulations.'),
    ],
];

// Row 2
$data[] = [
    'id' => 'sol_r2_' . wp_rand(),
    'elType' => 'section',
    'isInner' => false,
    'settings' => ['content_width'=>'boxed','padding'=>['unit'=>'px','top'=>'0','right'=>'0','bottom'=>'80','left'=>'0','isLinked'=>false]],
    'elements' => [
        make_solution_card('fas fa-id-badge','Event Security','Customized crowd control and access management services for events of all sizes, ensuring safety without compromising guest experience.'),
        make_solution_card('fas fa-truck-moving','Relocation Security','We help clients relocate safely with armed escorts, asset tracking, and secure transport logistics for high-value moves.'),
        make_solution_card('fas fa-laptop-code','Cyber Security','Protecting your digital assets with vulnerability assessments, network monitoring, and incident response to defend against modern threats.'),
    ],
];

// --- SECTION 5: VALUES & TRUST ---
$data[] = [
    'id' => 'val_' . wp_rand(),
    'elType' => 'section',
    'settings' => [
        'content_width' => 'boxed',
        'background_background' => 'classic',
        'background_color' => '#222222',
        'padding' => ['unit'=>'px','top'=>'80','right'=>'0','bottom'=>'80','left'=>'0','isLinked'=>false],
    ],
    'elements' => [
        [
            'id' => 'val_c1_' . wp_rand(),
            'elType' => 'column',
            'settings' => ['_column_size'=>50],
            'elements' => [
                ['id'=>'val_img_'.wp_rand(),'elType'=>'widget','widgetType'=>'image','settings'=>['image'=>['url'=>$team_url,'id'=>$team_id],'image_size'=>'full','border_radius'=>['unit'=>'px','top'=>8,'right'=>8,'bottom'=>8,'left'=>8,'isLinked'=>true]],'elements'=>[]],
            ],
            'isInner' => false,
        ],
        [
            'id' => 'val_c2_' . wp_rand(),
            'elType' => 'column',
            'settings' => ['_column_size'=>50,'padding'=>['unit'=>'px','top'=>'20','right'=>'0','bottom'=>'0','left'=>'40','isLinked'=>false]],
            'elements' => [
                ['id'=>'val_h_'.wp_rand(),'elType'=>'widget','widgetType'=>'heading','settings'=>['title'=>'BUILT ON TRUST, INTEGRITY, RESPECT','title_color'=>'#ffffff','typography_typography'=>'custom','typography_font_weight'=>'700','typography_font_size'=>['unit'=>'px','size'=>32],'typography_line_height'=>['unit'=>'em','size'=>1.3]],'elements'=>[]],
                ['id'=>'val_t_'.wp_rand(),'elType'=>'widget','widgetType'=>'text-editor','settings'=>['editor'=>'<p>Our core principles are honesty, reliability, and respect in all operations. We believe that true security starts with trust — trust between our team and our clients, and trust in the integrity of every officer we deploy. With backgrounds in law enforcement and military service, our professionals uphold the highest standards of conduct and accountability.</p>','text_color'=>'#cccccc','typography_typography'=>'custom','typography_font_size'=>['unit'=>'px','size'=>16],'typography_line_height'=>['unit'=>'em','size'=>1.7]],'elements'=>[]],
            ],
            'isInner' => false,
        ],
    ],
    'isInner' => false,
];

// --- SECTION 6: FOOTER CTA ---
$data[] = [
    'id' => 'cta_' . wp_rand(),
    'elType' => 'section',
    'settings' => [
        'content_width' => 'boxed',
        'background_background' => 'classic',
        'background_color' => '#c91c1c',
        'padding' => ['unit'=>'px','top'=>'80','right'=>'20','bottom'=>'80','left'=>'20','isLinked'=>false],
    ],
    'elements' => [
        [
            'id' => 'cta_col_' . wp_rand(),
            'elType' => 'column',
            'settings' => ['_column_size'=>100],
            'elements' => [
                ['id'=>'cta_h_'.wp_rand(),'elType'=>'widget','widgetType'=>'heading','settings'=>['title'=>'READY TO SECURE YOUR PEACE OF MIND?','align'=>'center','title_color'=>'#ffffff','typography_typography'=>'custom','typography_font_weight'=>'700','typography_font_size'=>['unit'=>'px','size'=>38],'margin'=>['unit'=>'px','top'=>'0','right'=>'0','bottom'=>'30','left'=>'0','isLinked'=>false]],'elements'=>[]],
                ['id'=>'cta_b_'.wp_rand(),'elType'=>'widget','widgetType'=>'button','settings'=>['text'=>'REQUEST A QUOTE','align'=>'center','background_color'=>'#ffffff','button_text_color'=>'#222222','typography_typography'=>'custom','typography_font_weight'=>'700','typography_font_size'=>['unit'=>'px','size'=>16],'border_radius'=>['unit'=>'px','top'=>4,'right'=>4,'bottom'=>4,'left'=>4,'isLinked'=>true]],'elements'=>[]],
                ['id'=>'cta_info_'.wp_rand(),'elType'=>'widget','widgetType'=>'text-editor','settings'=>['editor'=>'<p style="text-align:center;margin-top:30px;color:#ffffff;font-size:15px;">📞 +1 (123) 456-7799 &nbsp;&nbsp;&nbsp; ✉️ ariesquote@gmail.com</p>','text_color'=>'#ffffff'],'elements'=>[]],
            ],
            'isInner' => false,
        ],
    ],
    'isInner' => false,
];

// 5. Save Elementor data
$json = wp_json_encode($data);
update_post_meta($page_id, '_elementor_data', $json);

// 6. Add custom CSS
$custom_css = '
/* Aries Redesign v2 Custom Styles */
body.elementor-page-' . $page_id . ' {
    font-family: "Inter", "Segoe UI", sans-serif;
}
body.elementor-page-' . $page_id . ' a:hover {
    color: #c91c1c !important;
}
body.elementor-page-' . $page_id . ' .elementor-button:hover {
    opacity: 0.9;
    transform: translateY(-1px);
    transition: all 0.3s ease;
}
';
update_post_meta($page_id, '_elementor_css', $custom_css);

// 7. Flush rewrite rules
flush_rewrite_rules();

echo "\n✅ Page created successfully!\n";
echo "Page ID: $page_id\n";
$permalink = get_permalink($page_id);
echo "URL: $permalink\n";
echo "Edit: {$site_url}/wp-admin/post.php?post={$page_id}&action=elementor\n";
