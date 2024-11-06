<div class="col-12 col-lg-8">
    @foreach($blogs as $blog)
        <x-blog-card :blog="$blog" />
    @endforeach

    <div class="d-flex justify-content-center mt-5 text-center">
        {!! $blogs->links() !!}
    </div>
</div>
