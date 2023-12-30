@if(!empty($attachments))

    <!-- ARTICLE ATTACHMENTS Start -->
        <h3>Prílohy <i class="fa-solid fa-paperclip me-3"></i></h3>

        @foreach ($attachments as $attachment)
            <x-partials.attachment-article :data="$attachment"/>
        @endforeach

    <!-- ARTICLE ATTACHMENTS End -->

@endif
