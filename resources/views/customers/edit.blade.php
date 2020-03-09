<FORM method="POST" action="/customers/update"> 
    @csrf <input type="hidden" name="id" value="{{$customer->id}}"> 
    Enter your first name:<input type="text" name="firstname" value="{{$customer->firstname}}"><br> 
    Enter your surname:<input type="text" name="surname" value="{{$customer->surname}}"><br> <input type="submit"> 
</FORM> 