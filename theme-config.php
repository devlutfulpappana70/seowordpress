<?php if(!function_exists('seon_configs')){
    function seon_configs($value){
        $configs = [
            'theme_colors' => [
                'primary'   => [
                    'title' => esc_html__('Primary', 'seon'), 
                    'value' => seon()->get_opt('primary_color', '#FF5266')
                ],
                'secondary'   => [
                    'title' => esc_html__('Secondary', 'seon'), 
                    'value' => seon()->get_opt('secondary_color', '#5A5A5A')
                ],
                'third'   => [
                    'title' => esc_html__('Third', 'seon'), 
                    'value' => seon()->get_opt('third_color', '#8BE6FC')
                ],
                'dark'   => [
                    'title' => esc_html__('Dark', 'seon'), 
                    'value' => seon()->get_opt('dark_color', '#5A5A5A')
                ],
                'body-bg'   => [
                    'title' => esc_html__('Body Background Color', 'seon'), 
                    'value' => seon()->get_page_opt('body_bg_color', '#fff')
                ]
            ],
            'link' => [
                'color' => seon()->get_opt('link_color', ['regular' => '#041442'])['regular'],
                'color-hover'   => seon()->get_opt('link_color', ['hover' => '#4b35cb'])['hover'],
                'color-active'  => seon()->get_opt('link_color', ['active' => '#4b35cb'])['active'],
            ],
            'gradient' => [
                'color-from' => seon()->get_opt('gradient_color', ['from' => '#FF9A3E'])['from'],
                'color-to' => seon()->get_opt('gradient_color', ['to' => '#FF5266'])['to'],
            ],
               
        ];
        return $configs[$value];
    }
}
if(!function_exists('seon_inline_styles')) {
    function seon_inline_styles() {  
        
        $theme_colors      = seon_configs('theme_colors');
        $link_color        = seon_configs('link');
        $gradient_color    = seon_configs('gradient');
        ob_start();
        echo ':root{';
            
            foreach ($theme_colors as $color => $value) {
                printf('--%1$s-color: %2$s;', str_replace('#', '',$color),  $value['value']);
            }
            foreach ($theme_colors as $color => $value) {
                printf('--%1$s-color-rgb: %2$s;', str_replace('#', '',$color),  seon_hex_rgb($value['value']));
            }
            foreach ($link_color as $color => $value) {
                printf('--link-%1$s: %2$s;', $color, $value);
            }
            foreach ($gradient_color as $color => $value) {
                printf('--gradient-%1$s: %2$s;', $color, $value);
            }
        echo '}';

        return ob_get_clean();
         
    }
}
 