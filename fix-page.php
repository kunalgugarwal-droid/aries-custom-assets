<?php
$page_id = 46;
$upload_base = wp_upload_dir()['baseurl'] . '/2026/05';

$hero_url = $upload_base . '/hero-background.png';
$team_url = $upload_base . '/team-security.png';
$logo_url = $upload_base . '/aries-logo.png';

global $wpdb;
$hero_id = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_title = 'hero-background' AND post_type = 'attachment'");
$team_id = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_title = 'team-security' AND post_type = 'attachment'");
$logo_id = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_title = 'aries-logo' AND post_type = 'attachment'");

function eid() { return substr(md5(wp_rand()), 0, 8); }

$data = [];

// --- HEADER ---
$data[] = [
    'id' => eid(), 'elType' => 'section', 'isInner' => false,
    'settings' => [
        'content_width' => 'boxed',
        'background_background' => 'classic',
        'background_color' => '#ffffff',
        'padding' => ['unit'=>'px','top'=>'15','right'=>'0','bottom'=>'15','left'=>'0','isLinked'=>false],
    ],
    'elements' => [
        ['id'=>eid(),'elType'=>'column','isInner'=>false,'settings'=>['_column_size'=>30,'_inline_size'=>30],
         'elements'=>[
            ['id'=>eid(),'elType'=>'widget','widgetType'=>'image','settings'=>['image'=>['url'=>$logo_url,'id'=>$logo_id],'image_size'=>'medium','width'=>['unit'=>'px','size'=>180]],'elements'=>[],'isInner'=>false],
        ]],
        ['id'=>eid(),'elType'=>'column','isInner'=>false,'settings'=>['_column_size'=>50,'_inline_size'=>50],
         'elements'=>[
            ['id'=>eid(),'elType'=>'widget','widgetType'=>'text-editor','settings'=>[
                'editor'=>'<p><a href="#" style="color:#222; text-decoration:none; font-weight:500;">Home</a> &nbsp;&nbsp; <a href="#" style="color:#222; text-decoration:none; font-weight:500;">Services</a> &nbsp;&nbsp; <a href="#" style="color:#222; text-decoration:none; font-weight:500;">About</a> &nbsp;&nbsp; <a href="#" style="color:#222; text-decoration:none; font-weight:500;">Contact</a></p>',
                'align'=>'right',
            ],'elements'=>[],'isInner'=>false],
        ]],
        ['id'=>eid(),'elType'=>'column','isInner'=>false,'settings'=>['_column_size'=>20,'_inline_size'=>20],
         'elements'=>[
            ['id'=>eid(),'elType'=>'widget','widgetType'=>'button','settings'=>[
                'text'=>'GET A QUOTE','align'=>'right',
                'background_color'=>'#c91c1c', 'button_text_color'=>'#ffffff',
                'typography_typography'=>'custom','typography_font_weight'=>'600',
                'border_radius'=>['unit'=>'px','top'=>4,'right'=>4,'bottom'=>4,'left'=>4,'isLinked'=>true],
            ],'elements'=>[],'isInner'=>false],
        ]],
    ],
];

// --- HERO ---
$data[] = [
    'id' => eid(), 'elType' => 'section', 'isInner' => false,
    'settings' => [
        'content_width' => 'boxed',
        'min_height' => ['unit'=>'vh','size'=>80],
        'background_background'=>'classic',
        'background_color'=>'#222222',
        'background_image'=>['url'=>$hero_url,'id'=>$hero_id],
        'background_position'=>'center center','background_size'=>'cover',
        'background_overlay_background'=>'classic','background_overlay_color'=>'rgba(0,0,0,0.55)',
        'padding'=>['unit'=>'px','top'=>'120','right'=>'20','bottom'=>'120','left'=>'20','isLinked'=>false],
    ],
    'elements' => [
        ['id'=>eid(),'elType'=>'column','isInner'=>false,'settings'=>['_column_size'=>100],
         'elements'=>[
            ['id'=>eid(),'elType'=>'widget','widgetType'=>'heading','isInner'=>false,'settings'=>[
                'title'=>'PROFESSIONAL SECURITY & PROTECTIVE SERVICES',
                'align'=>'left','title_color'=>'#ffffff',
                'typography_typography'=>'custom','typography_font_family'=>'Inter',
                'typography_font_weight'=>'700','typography_font_size'=>['unit'=>'px','size'=>52],
                'typography_line_height'=>['unit'=>'em','size'=>1.15],
            ],'elements'=>[]],
            ['id'=>eid(),'elType'=>'widget','widgetType'=>'heading','isInner'=>false,'settings'=>[
                'title'=>'EX-LAW ENFORCEMENT & VETERANS. RELIABLE SOLUTIONS FOR YOUR SAFETY.',
                'header_size'=>'h3','align'=>'left','title_color'=>'#ffffff',
                'typography_typography'=>'custom','typography_font_family'=>'Inter',
                'typography_font_weight'=>'600','typography_font_size'=>['unit'=>'px','size'=>20],
                'margin'=>['unit'=>'px','top'=>'15','right'=>'0','bottom'=>'35','left'=>'0','isLinked'=>false],
            ],'elements'=>[]],
            ['id'=>eid(),'elType'=>'section','isInner'=>true,
             'settings'=>['content_width'=>'full','gap'=>'no'],
             'elements'=>[
                ['id'=>eid(),'elType'=>'column','isInner'=>true,'settings'=>['_column_size'=>50,'_inline_size'=>25],
                 'elements'=>[
                    ['id'=>eid(),'elType'=>'widget','widgetType'=>'button','isInner'=>false,'settings'=>[
                        'text'=>'OUR SERVICES','align'=>'left',
                        'background_color'=>'#c91c1c','button_text_color'=>'#ffffff',
                        'typography_typography'=>'custom','typography_font_weight'=>'600',
                        'border_radius'=>['unit'=>'px','top'=>4,'right'=>4,'bottom'=>4,'left'=>4,'isLinked'=>true],
                    ],'elements'=>[]],
                ]],
                ['id'=>eid(),'elType'=>'column','isInner'=>true,'settings'=>['_column_size'=>50,'_inline_size'=>25],
                 'elements'=>[
                    ['id'=>eid(),'elType'=>'widget','widgetType'=>'button','isInner'=>false,'settings'=>[
                        'text'=>'CONTACT US','align'=>'left',
                        'background_color'=>'transparent','button_text_color'=>'#ffffff',
                        'border_border'=>'solid',
                        'border_width'=>['unit'=>'px','top'=>2,'right'=>2,'bottom'=>2,'left'=>2,'isLinked'=>true],
                        'border_color'=>'#ffffff',
                        'typography_typography'=>'custom','typography_font_weight'=>'600',
                        'border_radius'=>['unit'=>'px','top'=>4,'right'=>4,'bottom'=>4,'left'=>4,'isLinked'=>true],
                    ],'elements'=>[]],
                ]],
            ]],
        ]],
    ],
];

function svc_card($icon, $title, $desc) {
    return ['id'=>eid(),'elType'=>'column','isInner'=>true,'settings'=>['_column_size'=>25],
        'elements'=>[
            ['id'=>eid(),'elType'=>'widget','widgetType'=>'icon','isInner'=>false,
             'settings'=>['selected_icon'=>['value'=>$icon,'library'=>'fa-solid'],'primary_color'=>'#c91c1c','align'=>'left'],'elements'=>[]],
            ['id'=>eid(),'elType'=>'widget','widgetType'=>'heading','isInner'=>false,
             'settings'=>['title'=>$title,'header_size'=>'h4','title_color'=>'#222222','typography_typography'=>'custom','typography_font_weight'=>'700','typography_font_size'=>['unit'=>'px','size'=>18]],'elements'=>[]],
            ['id'=>eid(),'elType'=>'widget','widgetType'=>'text-editor','isInner'=>false,
             'settings'=>['editor'=>'<p>'.$desc.'</p>','text_color'=>'#666666'],'elements'=>[]],
            ['id'=>eid(),'elType'=>'widget','widgetType'=>'button','isInner'=>false,
             'settings'=>['text'=>'LEARN MORE','align'=>'left','background_color'=>'transparent','button_text_color'=>'#c91c1c','typography_typography'=>'custom','typography_font_weight'=>'600'],'elements'=>[]],
        ],
    ];
}

$data[] = [
    'id'=>eid(),'elType'=>'section','isInner'=>false,
    'settings'=>[
        'content_width'=>'boxed',
        'background_background'=>'classic', 'background_color'=>'#ffffff',
        'padding'=>['unit'=>'px','top'=>'80','right'=>'0','bottom'=>'20','left'=>'0','isLinked'=>false],
    ],
    'elements'=>[
        ['id'=>eid(),'elType'=>'column','isInner'=>false,'settings'=>['_column_size'=>100],
         'elements'=>[
            ['id'=>eid(),'elType'=>'widget','widgetType'=>'heading','isInner'=>false,
             'settings'=>['title'=>'SCALABLE SECURITY SOLUTIONS','align'=>'center','title_color'=>'#222222',
                'typography_typography'=>'custom','typography_font_weight'=>'700','typography_font_size'=>['unit'=>'px','size'=>36],
                'margin'=>['unit'=>'px','top'=>'0','right'=>'0','bottom'=>'50','left'=>'0','isLinked'=>false]],'elements'=>[]],
        ]],
    ],
];

$data[] = [
    'id'=>eid(),'elType'=>'section','isInner'=>false,
    'settings'=>['content_width'=>'boxed','background_background'=>'classic','background_color'=>'#ffffff','padding'=>['unit'=>'px','top'=>'0','right'=>'0','bottom'=>'80','left'=>'0','isLinked'=>false]],
    'elements'=>[
        svc_card('fas fa-shield-alt','EXECUTIVE PROTECTION','Our close-protection details are led by seasoned professionals with law enforcement and military backgrounds, ensuring discreet and effective security.'),
        svc_card('fas fa-home','RESIDENTIAL SECURITY','Comprehensive home security assessments, patrol solutions, and 24/7 monitoring to safeguard your property and give you peace of mind.'),
        svc_card('fas fa-fire','FIRE WATCH','Round-the-clock site monitoring by trained fire watch personnel ensuring compliance with local fire codes and protecting your assets.'),
        svc_card('fas fa-id-badge','EVENT SECURITY','Customized crowd control, access management, and on-site security staffing tailored to events of any scale.'),
    ],
];

function sol_card($icon, $title, $desc) {
    return ['id'=>eid(),'elType'=>'column','isInner'=>true,'settings'=>['_column_size'=>33],
        'elements'=>[
            ['id'=>eid(),'elType'=>'widget','widgetType'=>'icon','isInner'=>false,
             'settings'=>['selected_icon'=>['value'=>$icon,'library'=>'fa-solid'],'primary_color'=>'#c91c1c','align'=>'left'],'elements'=>[]],
            ['id'=>eid(),'elType'=>'widget','widgetType'=>'heading','isInner'=>false,
             'settings'=>['title'=>$title,'header_size'=>'h4','title_color'=>'#222222','typography_typography'=>'custom','typography_font_weight'=>'700','typography_font_size'=>['unit'=>'px','size'=>17]],'elements'=>[]],
            ['id'=>eid(),'elType'=>'widget','widgetType'=>'text-editor','isInner'=>false,
             'settings'=>['editor'=>'<p>'.$desc.'</p>','text_color'=>'#666666','typography_typography'=>'custom','typography_font_size'=>['unit'=>'px','size'=>14]],'elements'=>[]],
            ['id'=>eid(),'elType'=>'widget','widgetType'=>'button','isInner'=>false,
             'settings'=>['text'=>'LEARN MORE','align'=>'left','background_color'=>'transparent','button_text_color'=>'#c91c1c','typography_typography'=>'custom','typography_font_weight'=>'600'],'elements'=>[]],
        ],
    ];
}

$data[] = [
    'id'=>eid(),'elType'=>'section','isInner'=>false,
    'settings'=>['content_width'=>'boxed','background_background'=>'classic','background_color'=>'#ffffff','padding'=>['unit'=>'px','top'=>'60','right'=>'0','bottom'=>'20','left'=>'0','isLinked'=>false]],
    'elements'=>[
        ['id'=>eid(),'elType'=>'column','isInner'=>false,'settings'=>['_column_size'=>100],
         'elements'=>[
            ['id'=>eid(),'elType'=>'widget','widgetType'=>'heading','isInner'=>false,
             'settings'=>['title'=>'SCALABLE SECURITY SOLUTIONS','align'=>'center','title_color'=>'#222222',
                'typography_typography'=>'custom','typography_font_weight'=>'700','typography_font_size'=>['unit'=>'px','size'=>36],
                'margin'=>['unit'=>'px','top'=>'0','right'=>'0','bottom'=>'40','left'=>'0','isLinked'=>false]],'elements'=>[]],
        ]],
    ],
];

$data[] = [
    'id'=>eid(),'elType'=>'section','isInner'=>false,
    'settings'=>['content_width'=>'boxed','background_background'=>'classic','background_color'=>'#ffffff','padding'=>['unit'=>'px','top'=>'0','right'=>'0','bottom'=>'20','left'=>'0','isLinked'=>false]],
    'elements'=>[
        sol_card('fas fa-shield-alt','Executive Protection','Our close-protection details provide discreet, professional security for corporate leaders and high-profile individuals around the clock.'),
        sol_card('fas fa-home','Residential Security','We deliver thorough home security assessments and patrol solutions designed to keep your family and property safe at all times.'),
        sol_card('fas fa-fire','Fire Watch','Trained fire watch personnel provide round-the-clock site monitoring, ensuring full compliance with fire safety codes and regulations.'),
    ],
];

$data[] = [
    'id'=>eid(),'elType'=>'section','isInner'=>false,
    'settings'=>['content_width'=>'boxed','background_background'=>'classic','background_color'=>'#ffffff','padding'=>['unit'=>'px','top'=>'0','right'=>'0','bottom'=>'80','left'=>'0','isLinked'=>false]],
    'elements'=>[
        sol_card('fas fa-id-badge','Event Security','Customized crowd control and access management services for events of all sizes, ensuring safety without compromising guest experience.'),
        sol_card('fas fa-truck-moving','Relocation Security','We help clients relocate safely with armed escorts, asset tracking, and secure transport logistics for high-value moves.'),
        sol_card('fas fa-laptop-code','Cyber Security','Protecting your digital assets with vulnerability assessments, network monitoring, and incident response to defend against modern threats.'),
    ],
];

$data[] = [
    'id'=>eid(),'elType'=>'section','isInner'=>false,
    'settings'=>['content_width'=>'boxed','background_background'=>'classic','background_color'=>'#222222',
        'padding'=>['unit'=>'px','top'=>'80','right'=>'0','bottom'=>'80','left'=>'0','isLinked'=>false],
    ],
    'elements'=>[
        ['id'=>eid(),'elType'=>'column','isInner'=>false,'settings'=>['_column_size'=>50],
         'elements'=>[
            ['id'=>eid(),'elType'=>'widget','widgetType'=>'image','isInner'=>false,
             'settings'=>['image'=>['url'=>$team_url,'id'=>$team_id],'image_size'=>'full',
                'border_radius'=>['unit'=>'px','top'=>8,'right'=>8,'bottom'=>8,'left'=>8,'isLinked'=>true]],'elements'=>[]],
        ]],
        ['id'=>eid(),'elType'=>'column','isInner'=>false,
         'settings'=>['_column_size'=>50,'padding'=>['unit'=>'px','top'=>'20','right'=>'0','bottom'=>'0','left'=>'40','isLinked'=>false]],
         'elements'=>[
            ['id'=>eid(),'elType'=>'widget','widgetType'=>'heading','isInner'=>false,
             'settings'=>['title'=>'BUILT ON TRUST, INTEGRITY, RESPECT','title_color'=>'#ffffff',
                'typography_typography'=>'custom','typography_font_weight'=>'700',
                'typography_font_size'=>['unit'=>'px','size'=>32],'typography_line_height'=>['unit'=>'em','size'=>1.3]],'elements'=>[]],
            ['id'=>eid(),'elType'=>'widget','widgetType'=>'text-editor','isInner'=>false,
             'settings'=>['editor'=>'<p style="color:#cccccc; font-size:16px; line-height:1.7;">Our core principles are honesty, reliability, and respect in all operations. We believe that true security starts with trust between our team and our clients, and trust in the integrity of every officer we deploy. With backgrounds in law enforcement and military service, our professionals uphold the highest standards of conduct and accountability.</p>'],'elements'=>[]],
        ]],
    ],
];

$data[] = [
    'id'=>eid(),'elType'=>'section','isInner'=>false,
    'settings'=>['content_width'=>'boxed','background_background'=>'classic','background_color'=>'#c91c1c',
        'padding'=>['unit'=>'px','top'=>'80','right'=>'20','bottom'=>'80','left'=>'20','isLinked'=>false],
    ],
    'elements'=>[
        ['id'=>eid(),'elType'=>'column','isInner'=>false,'settings'=>['_column_size'=>100],
         'elements'=>[
            ['id'=>eid(),'elType'=>'widget','widgetType'=>'heading','isInner'=>false,
             'settings'=>['title'=>'READY TO SECURE YOUR PEACE OF MIND?','align'=>'center','title_color'=>'#ffffff',
                'typography_typography'=>'custom','typography_font_weight'=>'700','typography_font_size'=>['unit'=>'px','size'=>38],
                'margin'=>['unit'=>'px','top'=>'0','right'=>'0','bottom'=>'30','left'=>'0','isLinked'=>false]],'elements'=>[]],
            ['id'=>eid(),'elType'=>'widget','widgetType'=>'button','isInner'=>false,
             'settings'=>['text'=>'REQUEST A QUOTE','align'=>'center','background_color'=>'#ffffff','button_text_color'=>'#222222',
                'typography_typography'=>'custom','typography_font_weight'=>'700','border_radius'=>['unit'=>'px','top'=>4,'right'=>4,'bottom'=>4,'left'=>4,'isLinked'=>true]],'elements'=>[]],
            ['id'=>eid(),'elType'=>'widget','widgetType'=>'text-editor','isInner'=>false,
             'settings'=>['editor'=>'<p style="text-align:center; color:#ffffff; font-size:15px; margin-top:25px;">Phone: +1 (123) 456-7799 | Email: ariesquote@gmail.com</p>'],'elements'=>[]],
        ]],
    ],
];

$json = wp_json_encode($data);
update_post_meta($page_id, '_elementor_data', wp_slash($json));

if (class_exists('\Elementor\Plugin')) {
    $post_css = \Elementor\Core\Files\CSS\Post::create($page_id);
    $post_css->update();
    echo "Elementor CSS regenerated\n";
} else {
    delete_post_meta($page_id, '_elementor_css');
}

echo "Done.\n";
