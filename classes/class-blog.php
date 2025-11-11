<?php

if (!class_exists('Seon_Blog')) {

    class Seon_Blog
    {
        
        public function get_archive_meta() {
            $archive_author = seon()->get_theme_opt( 'archive_author', true );
            $archive_date = seon()->get_theme_opt( 'archive_date', true );
            $archive_comment = seon()->get_theme_opt( 'archive_comment', true );
            if($archive_author || $archive_date || $archive_comment ) : ?>
                <div class="pxl-item--meta pxl-flex">
                    <?php if($archive_author) : ?>
                        <div class="pxl-item--author pxl-mr-25">
                            <span class="entry-author-avatar pxl-mr-15">
                                <?php echo get_avatar( get_the_author_meta( 'ID' ), 160 ); ?>
                            </span>
                            <span class="author-name">
                                <?php the_author_posts_link(); ?>
                            </span>
                        </div>
                    <?php endif; ?>
                    <div class="pxl-item-layout">
                        <ul>
                            <?php if($archive_comment) : ?>
                                <li class="pxl-comment pxl-mr-25 pxl-pr-25">
                                    <a href="<?php the_permalink(); ?>#comments" class="pxl-item--comment pxl-item--flexnw">
                                        <i class="pxl-mr-10">
                                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_44_923)">
                                                <path d="M16.8768 12.9987C18.6162 10.5583 18.3503 7.21473 15.9745 5.03677C14.889 4.04167 13.5052 3.42218 12.0103 3.24918C12.001 3.23771 11.9914 3.22636 11.981 3.2155C10.6805 1.86462 8.8122 1.08984 6.85505 1.08984C3.13063 1.08984 0 3.86483 0 7.41797C0 8.66373 0.386965 9.85795 1.12205 10.8893L0.095168 14.1134C0.0306211 14.316 0.0941133 14.5375 0.256148 14.6752C0.418465 14.8132 0.647438 14.8397 0.836613 14.7435L3.95944 13.1556C4.60076 13.4317 5.28082 13.6129 5.98507 13.6954C7.34358 15.124 9.22201 15.8555 11.1438 15.8555C12.1428 15.8555 13.1382 15.6519 14.0393 15.2649L17.1623 16.8529C17.2379 16.8913 17.3198 16.9102 17.4011 16.9102C17.757 16.9102 18.0122 16.5633 17.9037 16.2227L16.8768 12.9987ZM4.17227 12.0945C4.02458 12.0244 3.85277 12.0267 3.70705 12.1008L1.48282 13.2318L2.20915 10.9513C2.26202 10.7853 2.2295 10.6039 2.12221 10.4666C1.42379 9.57255 1.05462 8.51839 1.05462 7.41797C1.05462 4.5102 3.65667 2.14453 6.85505 2.14453C8.14303 2.14453 9.38296 2.53473 10.3887 3.2374C7.00151 3.57799 4.28878 6.22364 4.28878 9.52734C4.28878 10.5549 4.55217 11.5441 5.04875 12.4304C4.7481 12.3409 4.45528 12.2289 4.17227 12.0945ZM14.2918 14.2101C14.1482 14.1371 13.9763 14.1327 13.8266 14.2039C13.0045 14.5944 12.0768 14.8008 11.1438 14.8008C7.94545 14.8008 5.3434 12.4351 5.3434 9.52734C5.3434 6.61957 7.94545 4.25391 11.1438 4.25391C14.3422 4.25391 16.9443 6.61957 16.9443 9.52734C16.9443 10.6278 16.5751 11.6819 15.8766 12.5759C15.7694 12.7132 15.7369 12.8946 15.7897 13.0607L16.516 15.3411L14.2918 14.2101Z" fill="url(#paint0_linear_44_923)"/>
                                                <path d="M9 10.0547C9.29124 10.0547 9.52734 9.81859 9.52734 9.52734C9.52734 9.2361 9.29124 9 9 9C8.70876 9 8.47266 9.2361 8.47266 9.52734C8.47266 9.81859 8.70876 10.0547 9 10.0547Z" fill="url(#paint1_linear_44_923)"/>
                                                <path d="M11.1094 10.0547C11.4006 10.0547 11.6367 9.81859 11.6367 9.52734C11.6367 9.2361 11.4006 9 11.1094 9C10.8181 9 10.582 9.2361 10.582 9.52734C10.582 9.81859 10.8181 10.0547 11.1094 10.0547Z" fill="url(#paint2_linear_44_923)"/>
                                                <path d="M13.2188 10.0547C13.51 10.0547 13.7461 9.81859 13.7461 9.52734C13.7461 9.2361 13.51 9 13.2188 9C12.9275 9 12.6914 9.2361 12.6914 9.52734C12.6914 9.81859 12.9275 10.0547 13.2188 10.0547Z" fill="url(#paint3_linear_44_923)"/>
                                                </g>
                                                <defs>
                                                <linearGradient id="paint0_linear_44_923" x1="2.18956e-07" y1="1.65485" x2="20.1821" y2="5.52206" gradientUnits="userSpaceOnUse">
                                                <stop stop-color="#FF9A3E"/>
                                                <stop offset="1" stop-color="#FF5266"/>
                                                </linearGradient>
                                                <linearGradient id="paint1_linear_44_923" x1="8.47266" y1="9.03767" x2="9.66481" y2="9.23844" gradientUnits="userSpaceOnUse">
                                                <stop stop-color="#FF9A3E"/>
                                                <stop offset="1" stop-color="#FF5266"/>
                                                </linearGradient>
                                                <linearGradient id="paint2_linear_44_923" x1="10.582" y1="9.03767" x2="11.7742" y2="9.23844" gradientUnits="userSpaceOnUse">
                                                <stop stop-color="#FF9A3E"/>
                                                <stop offset="1" stop-color="#FF5266"/>
                                                </linearGradient>
                                                <linearGradient id="paint3_linear_44_923" x1="12.6914" y1="9.03767" x2="13.8836" y2="9.23844" gradientUnits="userSpaceOnUse">
                                                <stop stop-color="#FF9A3E"/>
                                                <stop offset="1" stop-color="#FF5266"/>
                                                </linearGradient>
                                                <clipPath id="clip0_44_923">
                                                <rect width="18" height="18" fill="white"/>
                                                </clipPath>
                                                </defs>
                                            </svg>
                                        </i>
                                        <?php echo comments_number(esc_html__('No Comments', 'seon'),esc_html__('1 Comment', 'seon'),esc_html__('% Comments', 'seon')); ?>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if($archive_date) : ?>
                                <li class="pxl-item--date">
                                    <i class="pxl-mr-10">
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_44_888)">
                                            <path d="M16.0714 1.92857H14.1429V0.642869C14.1429 0.287816 13.855 0 13.5 0C13.1449 0 12.8571 0.287816 12.8571 0.642869V1.92857H5.14284V0.642869C5.14284 0.287816 4.85502 0 4.50001 0C4.14499 0 3.85714 0.287816 3.85714 0.642869V1.92857H1.92857C0.863449 1.92857 0 2.79202 0 3.85714V16.0714C0 17.1365 0.863449 18 1.92857 18H16.0714C17.1365 18 18 17.1365 18 16.0714V3.85714C18 2.79202 17.1365 1.92857 16.0714 1.92857ZM16.7143 16.0714C16.7143 16.4265 16.4264 16.7143 16.0714 16.7143H1.92857C1.57352 16.7143 1.2857 16.4265 1.2857 16.0714V7.71428H16.7143V16.0714ZM16.7143 6.42858H1.2857V3.85714C1.2857 3.50209 1.57352 3.21427 1.92857 3.21427H3.85714V4.49997C3.85714 4.85502 4.14496 5.14284 4.50001 5.14284C4.85506 5.14284 5.14288 4.85502 5.14288 4.49997V3.21427H12.8572V4.49997C12.8572 4.85502 13.145 5.14284 13.5 5.14284C13.8551 5.14284 14.1429 4.85502 14.1429 4.49997V3.21427H16.0715C16.4265 3.21427 16.7143 3.50209 16.7143 3.85714V6.42858H16.7143Z" fill="url(#paint0_linear_44_888)"/>
                                            <path d="M5.14341 9H3.85771C3.50266 9 3.21484 9.28782 3.21484 9.64287C3.21484 9.99792 3.50266 10.2857 3.85771 10.2857H5.14341C5.49847 10.2857 5.78628 9.99792 5.78628 9.64287C5.78628 9.28782 5.49847 9 5.14341 9Z" fill="url(#paint1_linear_44_888)"/>
                                            <path d="M9.64341 9H8.35771C8.00266 9 7.71484 9.28782 7.71484 9.64287C7.71484 9.99792 8.00266 10.2857 8.35771 10.2857H9.64341C9.99847 10.2857 10.2863 9.99792 10.2863 9.64287C10.2863 9.28782 9.99847 9 9.64341 9Z" fill="url(#paint2_linear_44_888)"/>
                                            <path d="M14.1434 9H12.8577C12.5027 9 12.2148 9.28782 12.2148 9.64287C12.2148 9.99792 12.5027 10.2857 12.8577 10.2857H14.1434C14.4985 10.2857 14.7863 9.99792 14.7863 9.64287C14.7862 9.28782 14.4984 9 14.1434 9Z" fill="url(#paint3_linear_44_888)"/>
                                            <path d="M5.14341 11.5703H3.85771C3.50266 11.5703 3.21484 11.8581 3.21484 12.2132C3.21484 12.5682 3.50266 12.8561 3.85771 12.8561H5.14341C5.49847 12.8561 5.78628 12.5682 5.78628 12.2132C5.78628 11.8581 5.49847 11.5703 5.14341 11.5703Z" fill="url(#paint4_linear_44_888)"/>
                                            <path d="M9.64341 11.5703H8.35771C8.00266 11.5703 7.71484 11.8581 7.71484 12.2132C7.71484 12.5682 8.00266 12.8561 8.35771 12.8561H9.64341C9.99847 12.8561 10.2863 12.5682 10.2863 12.2132C10.2863 11.8581 9.99847 11.5703 9.64341 11.5703Z" fill="url(#paint5_linear_44_888)"/>
                                            <path d="M14.1434 11.5703H12.8577C12.5027 11.5703 12.2148 11.8581 12.2148 12.2132C12.2148 12.5682 12.5027 12.8561 12.8577 12.8561H14.1434C14.4985 12.8561 14.7863 12.5682 14.7863 12.2132C14.7862 11.8581 14.4984 11.5703 14.1434 11.5703Z" fill="url(#paint6_linear_44_888)"/>
                                            <path d="M5.14341 14.1426H3.85771C3.50266 14.1426 3.21484 14.4304 3.21484 14.7854C3.21484 15.1405 3.50266 15.4283 3.85771 15.4283H5.14341C5.49847 15.4283 5.78628 15.1405 5.78628 14.7854C5.78628 14.4304 5.49847 14.1426 5.14341 14.1426Z" fill="url(#paint7_linear_44_888)"/>
                                            <path d="M9.64341 14.1426H8.35771C8.00266 14.1426 7.71484 14.4304 7.71484 14.7854C7.71484 15.1405 8.00266 15.4283 8.35771 15.4283H9.64341C9.99847 15.4283 10.2863 15.1405 10.2863 14.7854C10.2863 14.4304 9.99847 14.1426 9.64341 14.1426Z" fill="url(#paint8_linear_44_888)"/>
                                            <path d="M14.1434 14.1426H12.8577C12.5027 14.1426 12.2148 14.4304 12.2148 14.7854C12.2148 15.1405 12.5027 15.4283 12.8577 15.4283H14.1434C14.4985 15.4283 14.7863 15.1405 14.7863 14.7854C14.7863 14.4304 14.4984 14.1426 14.1434 14.1426Z" fill="url(#paint9_linear_44_888)"/>
                                            </g>
                                            <defs>
                                            <linearGradient id="paint0_linear_44_888" x1="2.18956e-07" y1="0.642856" x2="20.3461" y2="4.06937" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#FF9A3E"/>
                                            <stop offset="1" stop-color="#FF5266"/>
                                            </linearGradient>
                                            <linearGradient id="paint1_linear_44_888" x1="3.21484" y1="9.04592" x2="5.89933" y2="9.9501" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#FF9A3E"/>
                                            <stop offset="1" stop-color="#FF5266"/>
                                            </linearGradient>
                                            <linearGradient id="paint2_linear_44_888" x1="7.71484" y1="9.04592" x2="10.3993" y2="9.9501" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#FF9A3E"/>
                                            <stop offset="1" stop-color="#FF5266"/>
                                            </linearGradient>
                                            <linearGradient id="paint3_linear_44_888" x1="12.2148" y1="9.04592" x2="14.8993" y2="9.9501" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#FF9A3E"/>
                                            <stop offset="1" stop-color="#FF5266"/>
                                            </linearGradient>
                                            <linearGradient id="paint4_linear_44_888" x1="3.21484" y1="11.6162" x2="5.89933" y2="12.5204" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#FF9A3E"/>
                                            <stop offset="1" stop-color="#FF5266"/>
                                            </linearGradient>
                                            <linearGradient id="paint5_linear_44_888" x1="7.71484" y1="11.6162" x2="10.3993" y2="12.5204" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#FF9A3E"/>
                                            <stop offset="1" stop-color="#FF5266"/>
                                            </linearGradient>
                                            <linearGradient id="paint6_linear_44_888" x1="12.2148" y1="11.6162" x2="14.8993" y2="12.5204" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#FF9A3E"/>
                                            <stop offset="1" stop-color="#FF5266"/>
                                            </linearGradient>
                                            <linearGradient id="paint7_linear_44_888" x1="3.21484" y1="14.1885" x2="5.89932" y2="15.0927" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#FF9A3E"/>
                                            <stop offset="1" stop-color="#FF5266"/>
                                            </linearGradient>
                                            <linearGradient id="paint8_linear_44_888" x1="7.71484" y1="14.1885" x2="10.3993" y2="15.0927" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#FF9A3E"/>
                                            <stop offset="1" stop-color="#FF5266"/>
                                            </linearGradient>
                                            <linearGradient id="paint9_linear_44_888" x1="12.2148" y1="14.1885" x2="14.8993" y2="15.0927" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#FF9A3E"/>
                                            <stop offset="1" stop-color="#FF5266"/>
                                            </linearGradient>
                                            <clipPath id="clip0_44_888">
                                            <rect width="18" height="18" fill="white"/>
                                            </clipPath>
                                            </defs>
                                        </svg>
                                    </i>
                                    <?php echo get_the_date(); ?>     
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            <?php endif; 
        }

        public function get_post_metas(){
            $post_author = seon()->get_theme_opt( 'post_author', true );
            $post_comment = seon()->get_theme_opt( 'post_comment', true );
            $post_date = seon()->get_theme_opt( 'post_date', true );
            if($post_author || $post_date || $post_comment ) : ?>
                <ul class="pxl-item--meta pxl-flex">
                    <?php if($post_author) : ?>
                        <li class="pxl-item--author pxl-mr-25">
                            <span class="entry-author-avatar pxl-mr-15">
                                <?php echo get_avatar( get_the_author_meta( 'ID' ), 160 ); ?>
                            </span>
                            <span class="author-name">
                                <?php the_author_posts_link(); ?>
                            </span>
                        </li>
                    <?php endif; ?>
                    <?php if($post_comment) : ?>
                        <li class="pxl-comment pxl-mr-25 pxl-pr-25">
                            <a href="<?php the_permalink(); ?>#comments" class="pxl-item--comment pxl-item--flexnw">
                                <i class="pxl-mr-10">
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_44_923)">
                                        <path d="M16.8768 12.9987C18.6162 10.5583 18.3503 7.21473 15.9745 5.03677C14.889 4.04167 13.5052 3.42218 12.0103 3.24918C12.001 3.23771 11.9914 3.22636 11.981 3.2155C10.6805 1.86462 8.8122 1.08984 6.85505 1.08984C3.13063 1.08984 0 3.86483 0 7.41797C0 8.66373 0.386965 9.85795 1.12205 10.8893L0.095168 14.1134C0.0306211 14.316 0.0941133 14.5375 0.256148 14.6752C0.418465 14.8132 0.647438 14.8397 0.836613 14.7435L3.95944 13.1556C4.60076 13.4317 5.28082 13.6129 5.98507 13.6954C7.34358 15.124 9.22201 15.8555 11.1438 15.8555C12.1428 15.8555 13.1382 15.6519 14.0393 15.2649L17.1623 16.8529C17.2379 16.8913 17.3198 16.9102 17.4011 16.9102C17.757 16.9102 18.0122 16.5633 17.9037 16.2227L16.8768 12.9987ZM4.17227 12.0945C4.02458 12.0244 3.85277 12.0267 3.70705 12.1008L1.48282 13.2318L2.20915 10.9513C2.26202 10.7853 2.2295 10.6039 2.12221 10.4666C1.42379 9.57255 1.05462 8.51839 1.05462 7.41797C1.05462 4.5102 3.65667 2.14453 6.85505 2.14453C8.14303 2.14453 9.38296 2.53473 10.3887 3.2374C7.00151 3.57799 4.28878 6.22364 4.28878 9.52734C4.28878 10.5549 4.55217 11.5441 5.04875 12.4304C4.7481 12.3409 4.45528 12.2289 4.17227 12.0945ZM14.2918 14.2101C14.1482 14.1371 13.9763 14.1327 13.8266 14.2039C13.0045 14.5944 12.0768 14.8008 11.1438 14.8008C7.94545 14.8008 5.3434 12.4351 5.3434 9.52734C5.3434 6.61957 7.94545 4.25391 11.1438 4.25391C14.3422 4.25391 16.9443 6.61957 16.9443 9.52734C16.9443 10.6278 16.5751 11.6819 15.8766 12.5759C15.7694 12.7132 15.7369 12.8946 15.7897 13.0607L16.516 15.3411L14.2918 14.2101Z" fill="url(#paint0_linear_44_923)"/>
                                        <path d="M9 10.0547C9.29124 10.0547 9.52734 9.81859 9.52734 9.52734C9.52734 9.2361 9.29124 9 9 9C8.70876 9 8.47266 9.2361 8.47266 9.52734C8.47266 9.81859 8.70876 10.0547 9 10.0547Z" fill="url(#paint1_linear_44_923)"/>
                                        <path d="M11.1094 10.0547C11.4006 10.0547 11.6367 9.81859 11.6367 9.52734C11.6367 9.2361 11.4006 9 11.1094 9C10.8181 9 10.582 9.2361 10.582 9.52734C10.582 9.81859 10.8181 10.0547 11.1094 10.0547Z" fill="url(#paint2_linear_44_923)"/>
                                        <path d="M13.2188 10.0547C13.51 10.0547 13.7461 9.81859 13.7461 9.52734C13.7461 9.2361 13.51 9 13.2188 9C12.9275 9 12.6914 9.2361 12.6914 9.52734C12.6914 9.81859 12.9275 10.0547 13.2188 10.0547Z" fill="url(#paint3_linear_44_923)"/>
                                        </g>
                                        <defs>
                                        <linearGradient id="paint0_linear_44_923" x1="2.18956e-07" y1="1.65485" x2="20.1821" y2="5.52206" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#FF9A3E"/>
                                        <stop offset="1" stop-color="#FF5266"/>
                                        </linearGradient>
                                        <linearGradient id="paint1_linear_44_923" x1="8.47266" y1="9.03767" x2="9.66481" y2="9.23844" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#FF9A3E"/>
                                        <stop offset="1" stop-color="#FF5266"/>
                                        </linearGradient>
                                        <linearGradient id="paint2_linear_44_923" x1="10.582" y1="9.03767" x2="11.7742" y2="9.23844" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#FF9A3E"/>
                                        <stop offset="1" stop-color="#FF5266"/>
                                        </linearGradient>
                                        <linearGradient id="paint3_linear_44_923" x1="12.6914" y1="9.03767" x2="13.8836" y2="9.23844" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#FF9A3E"/>
                                        <stop offset="1" stop-color="#FF5266"/>
                                        </linearGradient>
                                        <clipPath id="clip0_44_923">
                                        <rect width="18" height="18" fill="white"/>
                                        </clipPath>
                                        </defs>
                                    </svg>
                                </i>
                                <?php echo comments_number(esc_html__('No Comments', 'seon'),esc_html__('1 Comment', 'seon'),esc_html__('% Comments', 'seon')); ?>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if($post_date) : ?>
                        <li class="pxl-item--date">
                            <i class="pxl-mr-10">
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_44_888)">
                                    <path d="M16.0714 1.92857H14.1429V0.642869C14.1429 0.287816 13.855 0 13.5 0C13.1449 0 12.8571 0.287816 12.8571 0.642869V1.92857H5.14284V0.642869C5.14284 0.287816 4.85502 0 4.50001 0C4.14499 0 3.85714 0.287816 3.85714 0.642869V1.92857H1.92857C0.863449 1.92857 0 2.79202 0 3.85714V16.0714C0 17.1365 0.863449 18 1.92857 18H16.0714C17.1365 18 18 17.1365 18 16.0714V3.85714C18 2.79202 17.1365 1.92857 16.0714 1.92857ZM16.7143 16.0714C16.7143 16.4265 16.4264 16.7143 16.0714 16.7143H1.92857C1.57352 16.7143 1.2857 16.4265 1.2857 16.0714V7.71428H16.7143V16.0714ZM16.7143 6.42858H1.2857V3.85714C1.2857 3.50209 1.57352 3.21427 1.92857 3.21427H3.85714V4.49997C3.85714 4.85502 4.14496 5.14284 4.50001 5.14284C4.85506 5.14284 5.14288 4.85502 5.14288 4.49997V3.21427H12.8572V4.49997C12.8572 4.85502 13.145 5.14284 13.5 5.14284C13.8551 5.14284 14.1429 4.85502 14.1429 4.49997V3.21427H16.0715C16.4265 3.21427 16.7143 3.50209 16.7143 3.85714V6.42858H16.7143Z" fill="url(#paint0_linear_44_888)"/>
                                    <path d="M5.14341 9H3.85771C3.50266 9 3.21484 9.28782 3.21484 9.64287C3.21484 9.99792 3.50266 10.2857 3.85771 10.2857H5.14341C5.49847 10.2857 5.78628 9.99792 5.78628 9.64287C5.78628 9.28782 5.49847 9 5.14341 9Z" fill="url(#paint1_linear_44_888)"/>
                                    <path d="M9.64341 9H8.35771C8.00266 9 7.71484 9.28782 7.71484 9.64287C7.71484 9.99792 8.00266 10.2857 8.35771 10.2857H9.64341C9.99847 10.2857 10.2863 9.99792 10.2863 9.64287C10.2863 9.28782 9.99847 9 9.64341 9Z" fill="url(#paint2_linear_44_888)"/>
                                    <path d="M14.1434 9H12.8577C12.5027 9 12.2148 9.28782 12.2148 9.64287C12.2148 9.99792 12.5027 10.2857 12.8577 10.2857H14.1434C14.4985 10.2857 14.7863 9.99792 14.7863 9.64287C14.7862 9.28782 14.4984 9 14.1434 9Z" fill="url(#paint3_linear_44_888)"/>
                                    <path d="M5.14341 11.5703H3.85771C3.50266 11.5703 3.21484 11.8581 3.21484 12.2132C3.21484 12.5682 3.50266 12.8561 3.85771 12.8561H5.14341C5.49847 12.8561 5.78628 12.5682 5.78628 12.2132C5.78628 11.8581 5.49847 11.5703 5.14341 11.5703Z" fill="url(#paint4_linear_44_888)"/>
                                    <path d="M9.64341 11.5703H8.35771C8.00266 11.5703 7.71484 11.8581 7.71484 12.2132C7.71484 12.5682 8.00266 12.8561 8.35771 12.8561H9.64341C9.99847 12.8561 10.2863 12.5682 10.2863 12.2132C10.2863 11.8581 9.99847 11.5703 9.64341 11.5703Z" fill="url(#paint5_linear_44_888)"/>
                                    <path d="M14.1434 11.5703H12.8577C12.5027 11.5703 12.2148 11.8581 12.2148 12.2132C12.2148 12.5682 12.5027 12.8561 12.8577 12.8561H14.1434C14.4985 12.8561 14.7863 12.5682 14.7863 12.2132C14.7862 11.8581 14.4984 11.5703 14.1434 11.5703Z" fill="url(#paint6_linear_44_888)"/>
                                    <path d="M5.14341 14.1426H3.85771C3.50266 14.1426 3.21484 14.4304 3.21484 14.7854C3.21484 15.1405 3.50266 15.4283 3.85771 15.4283H5.14341C5.49847 15.4283 5.78628 15.1405 5.78628 14.7854C5.78628 14.4304 5.49847 14.1426 5.14341 14.1426Z" fill="url(#paint7_linear_44_888)"/>
                                    <path d="M9.64341 14.1426H8.35771C8.00266 14.1426 7.71484 14.4304 7.71484 14.7854C7.71484 15.1405 8.00266 15.4283 8.35771 15.4283H9.64341C9.99847 15.4283 10.2863 15.1405 10.2863 14.7854C10.2863 14.4304 9.99847 14.1426 9.64341 14.1426Z" fill="url(#paint8_linear_44_888)"/>
                                    <path d="M14.1434 14.1426H12.8577C12.5027 14.1426 12.2148 14.4304 12.2148 14.7854C12.2148 15.1405 12.5027 15.4283 12.8577 15.4283H14.1434C14.4985 15.4283 14.7863 15.1405 14.7863 14.7854C14.7863 14.4304 14.4984 14.1426 14.1434 14.1426Z" fill="url(#paint9_linear_44_888)"/>
                                    </g>
                                    <defs>
                                    <linearGradient id="paint0_linear_44_888" x1="2.18956e-07" y1="0.642856" x2="20.3461" y2="4.06937" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#FF9A3E"/>
                                    <stop offset="1" stop-color="#FF5266"/>
                                    </linearGradient>
                                    <linearGradient id="paint1_linear_44_888" x1="3.21484" y1="9.04592" x2="5.89933" y2="9.9501" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#FF9A3E"/>
                                    <stop offset="1" stop-color="#FF5266"/>
                                    </linearGradient>
                                    <linearGradient id="paint2_linear_44_888" x1="7.71484" y1="9.04592" x2="10.3993" y2="9.9501" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#FF9A3E"/>
                                    <stop offset="1" stop-color="#FF5266"/>
                                    </linearGradient>
                                    <linearGradient id="paint3_linear_44_888" x1="12.2148" y1="9.04592" x2="14.8993" y2="9.9501" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#FF9A3E"/>
                                    <stop offset="1" stop-color="#FF5266"/>
                                    </linearGradient>
                                    <linearGradient id="paint4_linear_44_888" x1="3.21484" y1="11.6162" x2="5.89933" y2="12.5204" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#FF9A3E"/>
                                    <stop offset="1" stop-color="#FF5266"/>
                                    </linearGradient>
                                    <linearGradient id="paint5_linear_44_888" x1="7.71484" y1="11.6162" x2="10.3993" y2="12.5204" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#FF9A3E"/>
                                    <stop offset="1" stop-color="#FF5266"/>
                                    </linearGradient>
                                    <linearGradient id="paint6_linear_44_888" x1="12.2148" y1="11.6162" x2="14.8993" y2="12.5204" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#FF9A3E"/>
                                    <stop offset="1" stop-color="#FF5266"/>
                                    </linearGradient>
                                    <linearGradient id="paint7_linear_44_888" x1="3.21484" y1="14.1885" x2="5.89932" y2="15.0927" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#FF9A3E"/>
                                    <stop offset="1" stop-color="#FF5266"/>
                                    </linearGradient>
                                    <linearGradient id="paint8_linear_44_888" x1="7.71484" y1="14.1885" x2="10.3993" y2="15.0927" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#FF9A3E"/>
                                    <stop offset="1" stop-color="#FF5266"/>
                                    </linearGradient>
                                    <linearGradient id="paint9_linear_44_888" x1="12.2148" y1="14.1885" x2="14.8993" y2="15.0927" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#FF9A3E"/>
                                    <stop offset="1" stop-color="#FF5266"/>
                                    </linearGradient>
                                    <clipPath id="clip0_44_888">
                                    <rect width="18" height="18" fill="white"/>
                                    </clipPath>
                                    </defs>
                                </svg>
                            </i>
                            <?php echo get_the_date(); ?>     
                        </li>
                    <?php endif; ?>
                </ul>
            <?php endif; 
        }

        public function get_excerpt(){
            $archive_excerpt_length = seon()->get_theme_opt('archive_excerpt_length', '50');
            $seon_the_excerpt = get_the_excerpt();
            if(!empty($seon_the_excerpt)) {
                echo wp_trim_words( $seon_the_excerpt, $archive_excerpt_length, $more = null );
            } else {
                echo wp_kses_post($this->get_excerpt_more( $archive_excerpt_length ));
            }
        }

        public function get_excerpt_more( $post = null ) {
            $archive_excerpt_length = seon()->get_theme_opt('archive_excerpt_length', '50');
            $post = get_post( $post );

            if ( empty( $post ) || 0 >= $archive_excerpt_length ) {
                return '';
            }

            if ( post_password_required( $post ) ) {
                return esc_html__( 'Post password required.', 'seon' );
            }

            $content = apply_filters( 'the_content', strip_shortcodes( $post->post_content ) );
            $content = str_replace( ']]>', ']]&gt;', $content );

            $excerpt_more = apply_filters( 'seon_excerpt_more', '&hellip;' );
            $excerpt      = wp_trim_words( $content, $archive_excerpt_length, $excerpt_more );

            return $excerpt;
        }

        public function seon_set_post_views( $postID ) {
            $countKey = 'post_views_count';
            $count    = get_post_meta( $postID, $countKey, true );
            if ( $count == '' ) {
                $count = 0;
                delete_post_meta( $postID, $countKey );
                add_post_meta( $postID, $countKey, '0' );
            } else {
                $count ++;
                update_post_meta( $postID, $countKey, $count );
            }
        }

        public function get_tagged_in(){
            $tags_list = get_the_tag_list( '<label class="label">'.esc_attr__('Tags:', 'seon'). '</label>', ' ' );
            if ( $tags_list )
            {
                echo '<div class="pxl--tags pxl-mr-15">';
                printf('%2$s', '', $tags_list);
                echo '</div>';
            }
        }

        public function get_socials_share() { 
            $img_url = '';
            if (has_post_thumbnail(get_the_ID()) && wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), false)) {
                $img_url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), false);
            }
            $social_facebook = seon()->get_theme_opt( 'social_facebook', true );
            $social_twitter = seon()->get_theme_opt( 'social_twitter', true );
            $social_pinterest = seon()->get_theme_opt( 'social_pinterest', true );
            $social_linkedin = seon()->get_theme_opt( 'social_linkedin', true );
            ?>
            <div class="pxl--social">
                <label><?php echo esc_html__('Share:', 'seon'); ?></label>
                <?php if($social_facebook) : ?>
                    <a class="fb-social" title="<?php echo esc_attr__('Facebook', 'seon'); ?>" target="_blank" href="http://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>">facebook</a>
                <?php endif; ?>
                <?php if($social_twitter) : ?>
                    <a class="tw-social" title="<?php echo esc_attr__('Twitter', 'seon'); ?>" target="_blank" href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>%20">twitter</a>
                <?php endif; ?>
                <?php if($social_linkedin) : ?>
                    <a class="lin-social" title="<?php echo esc_attr__('LinkedIn', 'seon'); ?>" target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?php the_title(); ?>%20">linkedin</a>
                <?php endif; ?>
                <?php if($social_pinterest) : ?>
                    <a class="pin-social" title="<?php echo esc_attr__('Pinterest', 'seon'); ?>" target="_blank" href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php echo esc_url($img_url[0]); ?>&description=<?php the_title(); ?>%20">pinterest</a>
                <?php endif; ?>
            </div>
            <?php
        }

        public function get_socials_share_portfolio() { 
            $img_url = '';
            if (has_post_thumbnail(get_the_ID()) && wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), false)) {
                $img_url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), false);
            }
            ?>
            <div class="pxl--social">
                <a class="fb-social" title="<?php echo esc_attr__('Facebook', 'seon'); ?>" target="_blank" href="http://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"><i class="caseicon-facebook"></i></a>
                <a class="tw-social" title="<?php echo esc_attr__('Twitter', 'seon'); ?>" target="_blank" href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>%20"><i class="caseicon-twitter"></i></a>
                <a class="pin-social" title="<?php echo esc_attr__('Pinterest', 'seon'); ?>" target="_blank" href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php echo esc_url($img_url[0]); ?>&description=<?php the_title(); ?>%20"><i class="caseicon-pinterest"></i></a>
                <a class="lin-social" title="<?php echo esc_attr__('LinkedIn', 'seon'); ?>" target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?php the_title(); ?>%20"><i class="caseicon-linkedin"></i></a>
            </div>
            <?php
        }

        public function get_post_nav() {
            global $post;
            $previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
            $next     = get_adjacent_post( false, '', false );

            if ( ! $next && ! $previous )
                return;
            ?>
            <?php
            $next_post = get_next_post();
            $previous_post = get_previous_post();

            if( !empty($next_post) || !empty($previous_post) ) { 
                $page_for_posts = get_option( 'page_for_posts' );
                ?>
                <div class="pxl-post--navigation">
                    <div class="pxl--items pxl-flex-middle">
                        <div class="pxl--item pxl--item-prev">
                            <?php if ( is_a( $previous_post , 'WP_Post' ) && get_the_title( $previous_post->ID ) != '') { 
                                $prev_img_id = get_post_thumbnail_id($previous_post->ID);
                                $prev_img_url = wp_get_attachment_image_src($prev_img_id, 'seon-thumb-xs');
                                ?>
                                <a class="pxl--label" href="<?php echo esc_url(get_permalink( $previous_post->ID )); ?>"><i class="caseicon-double-chevron-left"></i><span><?php echo esc_html__('Previous Post', 'seon'); ?></span></a>
                                <div class="pxl--holder">
                                    <?php if(!empty($prev_img_id)) : ?>
                                        <div class="pxl--img">
                                            <a  href="<?php echo esc_url(get_permalink( $previous_post->ID )); ?>"><img src="<?php echo wp_kses_post($prev_img_url[0]); ?>" /></a>
                                        </div>
                                    <?php endif; ?>
                                    <div class="pxl--meta">
                                        <a  href="<?php echo esc_url(get_permalink( $previous_post->ID )); ?>"><?php echo get_the_title( $previous_post->ID ); ?></a>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <?php if ( get_option( 'page_for_posts' ) ) {
                            $post_id = get_option( 'page_for_posts' ); ?>
                            <div class="pxl-item-button">
                                <a href="<?php echo esc_url(get_permalink( $post_id )); ?>"><i class="flaticon-menu-2"></i></a>
                            </div>
                        <?php } ?>
                        <div class="pxl--item pxl--item-next">
                            <?php if ( is_a( $next_post , 'WP_Post' ) && get_the_title( $next_post->ID ) != '') {
                                $next_img_id = get_post_thumbnail_id($next_post->ID);
                                $next_img_url = wp_get_attachment_image_src($next_img_id, 'seon-thumb-xs');
                                ?>
                                <a class="pxl--label" href="<?php echo esc_url(get_permalink( $next_post->ID )); ?>"><span><?php echo esc_html__('Next Post', 'seon'); ?></span><i class="caseicon-double-chevron-right"></i></a>
                                <div class="pxl--holder">
                                    <div class="pxl--meta">
                                        <a href="<?php echo esc_url(get_permalink( $next_post->ID )); ?>"><?php echo get_the_title( $next_post->ID ); ?></a>
                                    </div>
                                    <?php if(!empty($next_img_id)) : ?>
                                        <div class="pxl--img">
                                            <a href="<?php echo esc_url(get_permalink( $next_post->ID )); ?>"><img src="<?php echo wp_kses_post($next_img_url[0]); ?>" /></a>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div><!-- .nav-links -->
                </div>
            <?php }
        }

        public function get_post_author_info() { ?>
            <div class="pxl-post--author-info pxl-item--flexnw">
                <div class="pxl-post--author-image pxl-mr-30"><?php echo get_avatar( get_the_author_meta( 'ID' ), 280 ); ?></div>
                <div class="pxl-post--author-meta">
                    <?php seon_get_user_name(); ?>
                    <div class="pxl-post--author-description"><?php the_author_meta( 'description' ); ?></div>
                    <?php seon_get_user_social(); ?>
                </div>
            </div>
        <?php }

        public function get_related_post(){
            $post_related_on = seon()->get_theme_opt( 'post_related_on', false );

            if($post_related_on) {
                global $post;
                $current_id = $post->ID;
                $posttags = get_the_category($post->ID);
                if (empty($posttags)) return;

                $tags = array();

                foreach ($posttags as $tag) {

                    $tags[] = $tag->term_id;
                }
                $post_number = '6';
                $query_similar = new WP_Query(array('posts_per_page' => $post_number, 'post_type' => 'post', 'post_status' => 'publish', 'category__in' => $tags));
                if (count($query_similar->posts) > 1) {
                    wp_enqueue_script( 'swiper' );
                    wp_enqueue_script( 'pxl-swiper' );
                    $opts = [
                        'slide_direction'               => 'horizontal',
                        'slide_percolumn'               => '1', 
                        'slide_mode'                    => 'slide', 
                        'slides_to_show'                => 3, 
                        'slides_to_show_lg'             => 3, 
                        'slides_to_show_md'             => 2, 
                        'slides_to_show_sm'             => 2, 
                        'slides_to_show_xs'             => 1, 
                        'slides_to_scroll'              => 1, 
                        'slides_gutter'                 => 30, 
                        'arrow'                         => false,
                        'dots'                          => true,
                        'dots_style'                    => 'bullets'
                    ];
                    $data_settings = wp_json_encode($opts);
                    $dir           = is_rtl() ? 'rtl' : 'ltr';
                    ?>
                    <div class="pxl-related-post">
                        <h4 class="widget-title"><?php echo esc_html__('Related Posts', 'seon'); ?></h4>
                        <div class="class" data-settings="<?php echo esc_attr($data_settings) ?>" data-rtl="<?php echo esc_attr($dir) ?>">
                            <div class="pxl-related-post-inner pxl-swiper-wrapper swiper-wrapper">
                            <?php foreach ($query_similar->posts as $post):
                                $thumbnail_url = '';
                                if (has_post_thumbnail(get_the_ID()) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)) :
                                    $thumbnail_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'pxl-blog-small', false);
                                endif;
                                if ($post->ID !== $current_id) : ?>
                                    <div class="pxl-swiper-slide swiper-slide grid-item">
                                        <div class="pxl-grid-item-inner">
                                            <?php if (has_post_thumbnail()) { ?>
                                                <div class="item-featured">
                                                    <a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url($thumbnail_url[0]); ?>" /></a>
                                                </div>
                                            <?php } ?>
                                            <h3 class="item-title">
                                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                            </h3>
                                        </div>
                                    </div>
                                <?php endif;
                            endforeach; ?>
                            </div>
                        </div>
                    </div>
                <?php }
            }

            wp_reset_postdata();
        }
    }
}
