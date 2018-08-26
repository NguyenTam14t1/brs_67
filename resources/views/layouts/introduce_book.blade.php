<ul class="meta">
    <li><a href="#"><span class="lnr lnr-user"></span> {{ $book->author }}</a></li>
    <li><a href="{{ route('book.show', $book->id) }}"><span class="lnr lnr-calendar-full"></span>{{ $book->publish_date }}</a></li>
    <li><a href="{{ route('book.show', $book->id) }}"><i class="fa fa-eye"></i> {{ $book->counter_view }}</a></li>
    <li>{!! $book->showRate($book->average_rating) !!}</li>   
</ul>
