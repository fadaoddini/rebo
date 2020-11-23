
<div class="rating-and-review-wrapper bg-white py-3 mb-3">
    <div class="container">
        <h6>رتبه بندی ها ونظر ها</h6>
        <div class="rating-review-content">
            <ul class="pl-0">


                @foreach($comments as $row)
                <li class="single-user-review d-flex">
                    <div class="user-thumbnail"><img src="img/bg-img/7.jpg" alt=""></div>
                    <div class="rating-comment">
                        <div class="rating">

                            @for($i=0;$i<$row->rating;$i++)
                                <i class="lni lni-star-filled"></i>
                                @endfor




                        </div>
                        <p class="comment mb-0">{{$row->body}}</p><span class="name-date">{{$row->name}}</span>
                    </div>
                </li>

                @endforeach


            </ul>
        </div>
    </div>
</div>
