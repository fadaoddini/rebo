

<div class="ratings-submit-form bg-white py-3">
    <div class="container">
        <h6>ارسال نظر</h6>
        <form method="post" action="{{route('comment.store',$product_single->id)}}">
            @csrf
            <div class="stars mb-3">


                <input class="star-1" type="radio" name="rating" value="1" id="star1">
                <label class="star-1" for="star1"></label>
                <input class="star-2" type="radio" name="rating" value="2" id="star2">
                <label class="star-2" for="star2"></label>
                <input class="star-3" type="radio" name="rating" value="3" id="star3">
                <label class="star-3" for="star3"></label>
                <input class="star-4" type="radio" name="rating" value="4" id="star4">
                <label class="star-4" for="star4"></label>
                <input class="star-5" type="radio" name="rating" value="5" id="star5">
                <label class="star-5" for="star5"></label><span></span>
            </div>
            <input type="text" class="form-control mb-2 " name="name" placeholder="نام*" required>
            <textarea class="form-control mb-3" id="comments" name="body" cols="30" rows="10" data-max-length="200" placeholder="نظرخود را بنویسید ..."></textarea>
            <button class="btn btn-sm btn-primary" type="submit">ارسال نظر</button>
        </form>
    </div>
</div>
