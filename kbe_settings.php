<div id="wpbody">
    <div id="wpbody-content">
        <div class="wrap">
            
            <h2><?php _e('Knowledgebase Display Settings','kbe')?></h2>
            <?php
                global $wpdb;
                
                $tbl_posts = $wpdb->prefix."posts";
                
                if(isset($_GET['settings-updated'])){
                    $kbe_posts = $wpdb->get_results("Select * From $tbl_posts Where post_content like '%[kbe_knowledgebase]%' and post_type = 'page'");
                    
                    foreach($kbe_posts as $kbe_post){
                        $kbe_id = $kbe_post->ID;
                        $kbe_slug = get_option('kbe_plugin_slug');
                        
                        $kbe_post_data = array(
                            'post_name' => $kbe_slug
                        );
                        
                        $kbe_post_where = array(
                            'ID' => $kbe_id
                        );
                        
                        $wpdb->update($tbl_posts, $kbe_post_data, $kbe_post_where);
                    }
                    flush_rewrite_rules();
            ?>
                <div class='updated' style='margin-top:10px;'>
                    <p><?php _e('Settings updated successfully','kbe') ?></p>
                </div>
            <?php
                }
            ?>
            <div class="kbe_admin_left_bar">
                <div class="kbe_admin_left_content">
                    <div class="kbe_admin_left_heading">
                        <h3><?php _e('Settings','kbe'); ?></h3>
                    </div>
                    <div class="kbe_admin_settings">
                        <form method="post" action="options.php">
                        <?php  
                            settings_fields('kbe_settings_group');
                        ?>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top: 18px;">
                            <tr>
                                <td width="35%" valign="top">
                                    <label><?php _e('Knowledgebase Slug','kbe'); ?></label>
                                </td>
                                <td colspan="3">
                                    <input type="text" name="kbe_plugin_slug" id="kbe_plugin_slug" value="<?php echo get_option('kbe_plugin_slug'); ?>">
                                </td>
                            </tr>
                            <tr>
                                <td valign="top">
                                    <label><?php _e('Number of articles to show','kbe'); ?></label>
                                </td>
                                <td colspan="3">
                                    <input type="text" name="kbe_article_qty" id="kbe_article_qty" value="<?php echo get_option('kbe_article_qty'); ?>">
                                <p>
                                    <strong><?php _e('Note:','kbe'); ?></strong>
                                    <?php _e('Set the number of articles to show in each category on KB homepage','kbe'); ?>
                              	</p>
                                </td>
                            </tr>
                            <tr>
                                <td valign="top">
                                    <label><?php _e('Knowledgebase search','kbe'); ?></label>
                                </td>
                                <td width="15%">
                                    <input type="radio" name="kbe_search_setting" id="kbe_search_setting" value="1" <?php if(get_option('kbe_search_setting')=='1'){echo 'checked="checked"';} ?>>
                                    <span><?php _e('On','kbe'); ?></span>
                                </td>
                                <td width="15%">
                                    <input type="radio" name="kbe_search_setting" id="kbe_search_setting" value="0" <?php if(get_option('kbe_search_setting')=='0'){echo 'checked="checked"';} ?>>
                                    <span><?php _e('Off','kbe'); ?></span>
                                </td>
                                <td width="45%">&nbsp;</td>
                            </tr>
                            <tr>
                                <td valign="top">
                                    <label><?php _e('Knowledgebase breadcrumbs','kbe'); ?></label>
                                </td>
                                <td>
                                    <input type="radio" name="kbe_breadcrumbs_setting" id="kbe_breadcrumbs_setting" value="1" <?php if(get_option('kbe_breadcrumbs_setting')=='1'){echo 'checked="checked"';} ?>>
                                    <span><?php _e('On','kbe'); ?></span>
                                </td>
                                <td>
                                    <input type="radio" name="kbe_breadcrumbs_setting" id="kbe_breadcrumbs_setting" value="0" <?php if(get_option('kbe_breadcrumbs_setting')=='0'){echo 'checked="checked"';} ?>>
                                    <span><?php _e('Off','kbe'); ?></span>
                                </td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td valign="top">
                                    <label><?php _e('Knowledgebase home page sidebar','kbe'); ?></label>
                                </td>
                                <td>
                                    <input type="radio" name="kbe_sidebar_home" id="kbe_sidebar_home" value="1" <?php if(KBE_SIDEBAR_HOME=='1'){echo 'checked="checked"';} ?>>
                                    <span><?php _e('Left','kbe'); ?></span>
                                </td>
                                <td>
                                    <input type="radio" name="kbe_sidebar_home" id="kbe_sidebar_home" value="2" <?php if(KBE_SIDEBAR_HOME=='2'){echo 'checked="checked"';} ?>>
                                    <span><?php _e('Right','kbe'); ?></span>
                                </td>
                                <td>
                                    <input type="radio" name="kbe_sidebar_home" id="kbe_sidebar_home" value="0" <?php if(KBE_SIDEBAR_HOME=='0'){echo 'checked="checked"';} ?>>
                                    <span><?php _e('None','kbe'); ?></span>
                                </td>
                            </tr>
                            <tr>
                                <td valign="top">
                                    <label><?php _e('Knowledgebase inner pages sidebar','kbe'); ?></label>
                                </td>
                                <td>
                                    <input type="radio" name="kbe_sidebar_inner" id="kbe_sidebar_inner" value="1" <?php if(KBE_SIDEBAR_INNER=='1'){echo 'checked="checked"';} ?>>
                                    <span><?php _e('Left','kbe'); ?></span>
                                </td>
                                <td>
                                    <input type="radio" name="kbe_sidebar_inner" id="kbe_sidebar_inner" value="2" <?php if(KBE_SIDEBAR_INNER=='2'){echo 'checked="checked"';} ?>>
                                    <span><?php _e('Right','kbe'); ?></span>
                                </td>
                                <td>
                                    <input type="radio" name="kbe_sidebar_inner" id="kbe_sidebar_inner" value="0" <?php if(KBE_SIDEBAR_INNER=='0'){echo 'checked="checked"';} ?>>
                                    <span><?php _e('None','kbe'); ?></span>
                                </td>
                            </tr>
                            <tr>
                                <td valign="top">
                                    <label><?php _e('Knowledgebase comments','kbe'); ?></label>
                                </td>
                                <td>
                                    <input type="radio" name="kbe_comments_setting" id="kbe_comments_setting" value="1" <?php if(get_option('kbe_comments_setting')=='1'){echo 'checked="checked"';} ?>>
                                    <span><?php _e('On','kbe'); ?></span>
                                </td>
                                <td>
                                    <input type="radio" name="kbe_comments_setting" id="kbe_comments_setting" value="0" <?php if(get_option('kbe_comments_setting')=='0'){echo 'checked="checked"';} ?>>
                                    <span><?php _e('Off','kbe'); ?></span>
                                </td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td valign="top">
                                    <label><?php _e('Knowledgebase theme color','kbe'); ?></label>
                                </td>
                                <td colspan="3">
                                    <input type="text" name="kbe_bgcolor" id="kbe_bgcolor" value="<?php echo get_option('kbe_bgcolor'); ?>" class="cp-field">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4" align="right" style="border:0px;">
                                    <input type="submit" value="<?php _e('Save Changes','kbe'); ?>" name="submit" id="submit">
                                </td>
                            </tr>
                        </table>
                        </form>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>