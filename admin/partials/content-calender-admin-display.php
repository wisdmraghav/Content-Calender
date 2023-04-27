<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://raghav.com
 * @since      1.0.0
 *
 * @package    Content_Calender
 * @subpackage Content_Calender/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<?php

global $wpdb, $table_prefix;
$content_calendar = $table_prefix . 'content_calendar';

if (isset($_POST['submit'])) {
    if (isset($_POST['publishingdate']) && isset($_POST['occasion']) && isset($_POST['posttitle']) && isset($_POST['post_author']) && isset($_POST['post_reviewer'])) {
        $wpdb->insert($content_calendar, array(
            'post_title' => esc_sql($_POST['posttitle']),
            'date' => esc_sql($_POST['publishingdate']),
            'occassion' => esc_sql($_POST['occasion']),
            'author' => esc_sql($_POST['post_author']),
            'reviewer' => esc_sql($_POST['post_reviewer']),
        ));
    }
}


?>


<div class="wrap">
    <h1>Plan Content</h1>

    <form action="" method="post">
        <table class="form-table" role="presentation">

            <tbody>

                <tr>
                    <th scope="row"><label for="posttitle">Post Title</label></th>
                    <td><input name="posttitle" type="text" id="posttitle" placeholder="Your Post Title" class="regular-text">
                    </td>
                </tr>

                <tr>
                    <th scope="row"><label for="publishingdate">Publishing Date</label></th>
                    <td><input name="publishingdate" type="date" id="publishingdate" class="regular-text">
                    </td>
                </tr>

                <tr>
                    <th scope="row"><label for="occasion">Occasion</label></th>
                    <td><input name="occasion" type="text" id="occasion" placeholder="Diwali" class="regular-text">
                        <p class="description" id="occasion-description">On What Occasion You Want To Publish.  
                        </p>
                    </td>
                </tr>

                <tr>
                    <th scope="row"><label for="post_author">Post Author</label></th>
                    <td>
                        <select name="post_author" id="post_author">
                            <?php
                            $authors = get_users(array('role__in' => array('author')));
                            foreach ($authors as $author) {
                                echo '<option value="' . $author->display_name . '">' . $author->display_name . '</option>';
                            }
                            ?>
                        </select>
                    </td>
                </tr>

                <tr>
                    <th scope="row"><label for="post_reviewer">Post Reviewer</label></th>
                    <td><select name="post_reviewer" id="post_reviewer">

                            <?php
                            $reviewers = get_users(array('role__in' => array('administrator', 'contributor', 'editor')));
                            foreach ($reviewers as $reviewer) {
                                echo '<option value="' . $reviewer->display_name . '">' . $reviewer->display_name . '</option>';
                            }
                            ?>
                        </select></td>
                </tr>

            </tbody>
        </table>
        <p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="Add To Calender">
        </p>
    </form>
</div>