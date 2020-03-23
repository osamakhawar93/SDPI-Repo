<?php 
  $publication_date = get_post_meta( $post->ID, 'publication_date');
  $publication_author = get_post_meta( $post->ID, 'publication_author');
  $publication_file_link = get_post_meta( $post->ID, 'publication_file');
  $publication_file_link = wp_get_attachment_url($publication_file_link[0]);

?>


<div class="new-box <?= $count==0?'latest-new-box':'' ?>">
    <div class="action-icons">
        
    <a title="Blog">
        
        <svg height="480pt" viewBox="-8 0 480 480" width="480pt" xmlns="http://www.w3.org/2000/svg"><path d="m192.953125 219.792969c1.394531 2.59375 4.101563 4.207031 7.046875 4.207031.960938-.003906 1.914062-.171875 2.816406-.503906l126.640625-47.496094h102.542969c13.253906 0 24-10.746094 24-24v-96c0-13.253906-10.746094-24-24-24h-128c-13.253906 0-24 10.746094-24 24v91.929688l-84.703125 61.597656c-3.242187 2.351562-4.242187 6.738281-2.34375 10.265625zm99.75-61.320313c2.070313-1.507812 3.296875-3.914062 3.296875-6.472656v-96c0-4.417969 3.582031-8 8-8h128c4.417969 0 8 3.582031 8 8v96c0 4.417969-3.582031 8-8 8h-104c-.960938 0-1.914062.167969-2.816406.503906l-72.847656 27.328125zm0 0"/><path d="m152 352h-16v-19.390625c14.558594-6.355469 23.980469-20.722656 24-36.609375v-32c-.027344-22.082031-17.917969-39.972656-40-40h-16c-22.082031.027344-39.972656 17.917969-40 40v32c.019531 15.886719 9.441406 30.253906 24 36.609375v19.390625h-16c-30.914062.035156-55.964844 25.085938-56 56v48c0 13.253906 10.746094 24 24 24h144c13.253906 0 24-10.746094 24-24v-48c-.035156-30.914062-25.085938-55.964844-56-56zm-48-112h16c13.253906 0 24 10.746094 24 24h-4.6875l-5.65625-5.65625c-2.140625-2.140625-5.308594-2.890625-8.183594-1.9375l-22.769531 7.59375h-22.703125c0-13.253906 10.746094-24 24-24zm-24 56v-16h24c.859375 0 1.710938-.136719 2.527344-.40625l19.304687-6.402344 4.511719 4.503906c1.507812 1.488282 3.539062 2.316407 5.65625 2.304688h8v16c0 13.253906-10.746094 24-24 24h-16c-13.253906 0-24-10.746094-24-24zm24 40h16v16h-16zm38.238281 32-12.796875 64h-34.890625l-12.796875-64zm49.761719 88c0 4.417969-3.582031 8-8 8h-144c-4.417969 0-8-3.582031-8-8v-48c.066406-19.570312 14.28125-36.222656 33.601562-39.351562l14.558594 72.953124c.761719 3.722657 4.039063 6.398438 7.839844 6.398438h48c3.800781 0 7.078125-2.675781 7.839844-6.398438l14.558594-72.953124c19.320312 3.128906 33.535156 19.78125 33.601562 39.351562zm0 0"/><path d="m408 352h-16v-19.390625c14.558594-6.355469 23.980469-20.722656 24-36.609375v-32c-.027344-22.082031-17.917969-39.972656-40-40h-16c-22.082031.027344-39.972656 17.917969-40 40v32c.019531 15.886719 9.441406 30.253906 24 36.609375v19.390625h-16c-30.914062.035156-55.964844 25.085938-56 56v48c0 13.253906 10.746094 24 24 24h144c13.253906 0 24-10.746094 24-24v-48c-.035156-30.914062-25.085938-55.964844-56-56zm-48-112h16c13.253906 0 24 10.746094 24 24h-20.6875l-5.65625-5.65625c-2.140625-2.140625-5.308594-2.890625-8.183594-1.9375l-22.769531 7.59375h-6.703125c0-13.253906 10.746094-24 24-24zm-24 56v-16h8c.859375 0 1.710938-.136719 2.527344-.40625l19.304687-6.402344 4.511719 4.503906c1.507812 1.488282 3.539062 2.316407 5.65625 2.304688h24v16c0 13.253906-10.746094 24-24 24h-16c-13.253906 0-24-10.746094-24-24zm24 40h16v16h-16zm38.238281 32-12.796875 64h-34.890625l-12.796875-64zm49.761719 88c0 4.417969-3.582031 8-8 8h-144c-4.417969 0-8-3.582031-8-8v-48c.066406-19.570312 14.28125-36.222656 33.601562-39.351562l14.558594 72.953124c.761719 3.722657 4.039063 6.398438 7.839844 6.398438h48c3.800781 0 7.078125-2.675781 7.839844-6.398438l14.558594-72.953124c19.320312 3.128906 33.535156 19.78125 33.601562 39.351562zm0 0"/><path d="m142.703125 136 70.769531 23.59375c.816406.265625 1.667969.402344 2.527344.40625 3.078125 0 5.878906-1.761719 7.214844-4.535156 1.332031-2.773438.957031-6.0625-.96875-8.464844l-30.246094-37.808594v-85.191406c0-13.253906-10.746094-24-24-24h-144c-13.253906 0-24 10.746094-24 24v88c0 13.253906 10.746094 24 24 24zm-126.703125-24v-88c0-4.417969 3.582031-8 8-8h144c4.417969 0 8 3.582031 8 8v88c0 1.816406.617188 3.582031 1.753906 5l15.046875 18.839844-46.304687-15.433594c-.804688-.265625-1.648438-.402344-2.496094-.40625h-120c-4.417969 0-8-3.582031-8-8zm0 0"/><path d="m312 64h112v16h-112zm0 0"/><path d="m312 96h112v16h-112zm0 0"/><path d="m312 128h112v16h-112zm0 0"/></svg>

    </a>

    </div>
    <h4><?= get_the_title(); ?></h4>
    <p><?= wp_trim_words( get_the_content(), 25) ?></p>
    <p class='read-more clearfix'>
    <a class="float-right" href="<?= get_the_permalink(); ?>">Read More</a></p>
</div>