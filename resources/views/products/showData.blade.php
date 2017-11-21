<!DOCTYPE html>
<html>
<head>
    <title></title>
{!! Html::style('css/mpdfstyle.css') !!}    
</head>
<body>
    
<div class="container">
    <div class="row">

    @php // $address
        if ($request->id != 9 || $request->id != 18) {
            if ($request->address2) {
                $address = $request->address1 . ' • ' . $request->address2 . ' • ' . $request->city . ', ' . $request->state . '&nbsp;' . $request->zip;
            }
            else  {
                $address = $request->address1 . ' • ' . $request->city . ', ' . $request->state . '&nbsp;' . $request->zip;
            }
        }    
    @endphp 

{{-- ///////////////////////////// Fran BC //////////////////////////////////// --}}    
    @if ($request->id == 1 || $request->id == 10)
        @if ($request->id == 1)
             <div class="fbc_background">
        @elseif ($request->id == 10)
            <div class="fbc60_background">
        @endif
       
        <div class="fran_name">
            {{ $request->name }}
        </div>
        <div class="fran_title">
            {!! $request->title ?: '<br>' !!}
        </div>
        <div class="fran_address">
            {{ Auth::user()->loc_name }} • An Independently Owned Franchise<br>
            {{ $address }} <br>
            {{ $phone }} <br>
            {{ $request->email }} • ArthurRutenbergHomes.com <br>
            {{ $request->license }}
        </div>
            </div> {{-- close background class --}}
    @endif

{{-- ///////////////////////////// Fran Sales Rep BC //////////////////////////////////// --}}    
    @if ($request->id == 2 || $request->id == 11 || $request->id == 7 || $request->id == 16)
        @if ($request->id == 2 || $request->id == 7)
             <div class="srbc_background">
        @elseif ($request->id == 11 || $request->id == 16)
             <div class="srbc60_background">
        @endif
       
        <div class="srbc_name">
            {{ $request->name }}
        </div>
        <div class="srbc_title">
            {!! $request->title ?: '<br>' !!}
        </div>
        <div class="srbc_address">
            {{ $request->community }}<br>
            {{ Auth::user()->loc_name }} • An Independently Owned Franchise<br>
            {{ $address }} <br>
            {{ $phone }} <br>
            {{ $request->email }} • ArthurRutenbergHomes.com <br>
            {{ $request->license }}
        </div>
        </div> {{-- close background class --}}
    @endif

{{-- ///////////////////////////// Fran Photo Sales Rep BC /////////////////////// --}}    
    @if ($request->id == 3 || $request->id == 12)
        @if ($request->id == 3)
             <div class="psrbc_background">
        @elseif ($request->id == 12)
            <div class="psrbc60_background">
        @endif
       
        <div class="psrbc_name">
            {{ $request->name }}
        </div>
        <div class="psrbc_title">
            {!! $request->title ?: '<br>' !!}
        </div>
        <div class="psrbc_address">
            @if ($request->community)
                {{ $request->community }}<br>
            @else
                <br><br>
            @endif
            {{ Auth::user()->loc_name }} • An Independently Owned Franchise<br>
            {{ $address }} <br>
            {{ $phone }} <br>
            {{ $request->email }} • ArthurRutenbergHomes.com <br>
            {{ $request->license }}
        </div>
            </div> {{-- close background class --}}
    @endif

{{-- ///////////////////////////// Corp BC //////////////////////////////////// --}}    
    @if ($request->id == 4 || $request->id == 13 || $request->id == 27 || $request->id == 28)
        @if ($request->id == 4 || $request->id == 28)
             <div class="cbc_background">
        @elseif ($request->id == 13 || $request->id == 27)
            <div class="cbc60_background">
        @endif
       
        <div class="cbc_name">
            {{ $request->name }}
        </div>
        <div class="cbc_title">
            {!! $request->title ?: '<br>' !!}
        </div>
        <div class="cbc_address">
            Arthur Rutenberg Homes, Inc. <br>
            {{ $address }} <br>
            {{ $phone }} <br>
            {{ $request->email }} • ArthurRutenbergHomes.com
        </div>
            </div> {{-- close background class --}}
    @endif

{{-- //////////////////////// Design Studio BC ///////////////////////////// --}}    
    @if ($request->id == 29 || $request->id == 30 || $request->id == 31 || $request->id == 32)
        @if ($request->id == 29 || $request->id == 31)
             <div class="dsbc_background">
        @elseif ($request->id == 30 || $request->id == 32)
            <div class="dsbc60_background">
        @endif
       
        <div class="dsbc_name">
            {{ $request->name }}
        </div>
        <div class="dsbc_title">
            {!! $request->title ?: '<br>' !!}
        </div>
        <div class="dsbc_address">
            {{ $address }} <br>
            {{ $phone }} <br>
            {{ $request->email }} • ArthurRutenbergHomes.com <br>
            {{ Auth::user()->loc_name }} • An Independently Owned Franchise<br>
            {{ $request->license }}
        </div>
            </div> {{-- close background class --}}
    @endif

{{-- ///////////////////////////// Corp Note Pads //////////////////////////////////// --}}    
    @if ($request->id == 19 || $request->id == 20)
        @if ($request->id == 19)
            <div class="np_background">
        @elseif ($request->id == 20)
            <div class="np60_background">
        @endif
       <div class="np_name">
            {!! $request->name ?: '<br><br><br><br>' !!}
        </div>
        <div class="np_title">
            {!! $request->title ?: '<br>' !!}
        </div>
        <div class="cnp_address_line1">
            Arthur Rutenberg Homes, Inc.
        </div>
        <div class="cnp_address_line2">
            {{ $address }}
        </div>
        <div class="cnp_address_line3">
            {{ $phone }} 
        </div>
        <div class="cnp_address_line4">
            {{ $request->email }} • ArthurRutenbergHomes.com
        </div>
        </div>       
    @endif

{{-- ///////////////////////////// Fran & DS Note Pads //////////////////////////////////// --}}
    @if ($request->id == 21 || $request->id == 22 || $request->id == 33 || $request->id == 34)
        @if ($request->id == 21 || $request->id == 33)
            <div class="np_background">
        @elseif ($request->id == 22 || $request->id == 34)
            <div class="np60_background">
        @endif
       <div class="np_name">
            {!! $request->name ?: '<br><br><br><br>' !!}
        </div>
        <div class="np_title">
            {!! $request->title ?: '<br>' !!}
        </div>
        <div class="np_address_line1">
            {{ Auth::user()->loc_name }} • An Independently Owned Franchise
        </div>
        <div class="np_address_line2">
            {{ $address }}
        </div>
        <div class="np_address_line3">
            {{ $phone }} 
        </div>
        <div class="np_address_line4">
            @if (!empty($request->license)) 
                {{ $request->license }} •
            @endif
            {{ $request->email }} • ArthurRutenbergHomes.com
        </div>
        </div>       
    @endif

{{-- ///////////////////////////// Fran & DS Letterhead //////////////////////////////////// --}}    
    @if ($request->id == 8 || $request->id == 17 || $request->id == 37 || $request->id == 38)  
        @if ($request->id == 8 || $request->id == 37) 
            <div class="lh_background">
        @elseif ($request->id == 17 || $request->id == 38)
            <div class="lh60_background">
        @endif
        <div class="lh_address_line1">
            {{ Auth::user()->loc_name }} • An Independently Owned Franchise
        </div>
        <div class="lh_address_line2">
            {{ $address }}
            @if (!empty($request->phone) || (!empty($request->fax))) 
                • {{ $phone }}
            @endif
        </div>
        <div class="lh_address_line3">
            @if (!empty($request->license)) 
                {{ $request->license }} •
            @endif
            ArthurRutenbergHomes.com
        </div>
        </div>       
    @endif

{{-- ///////////////////////////////// Corp Letterhead ////////////////////////////////////// --}}    
    @if ($request->id == 5 || $request->id == 14)  
        @if ($request->id == 5) 
            <div class="lh_background">
        @elseif ($request->id == 14)
            <div class="lh60_background">
        @endif
        <div class="lh_address_line1">
            Arthur Rurtenberg Homes, Inc.
        </div>
        <div class="lh_address_line2">
            {{ $address }}
        </div>
        <div class="lh_address_line3">
            {{ $phone }} • ArthurRutenbergHomes.com
        </div>
        </div>       
    @endif

{{-- /////////////////////////////////// Franchise & DS Envelope /////////////////////////////////// --}}    
    @if ($request->id == 9 || $request->id == 18 || $request->id == 35 || $request->id == 36) 
        @if ($request->id == 9 || $request->id == 35)
            <div class="env_background">
        @elseif ($request->id == 18 || $request->id == 36)
            <div class="env60_background">
        @endif
        
        <div class="env_address">
            {{ Auth::user()->loc_name }}<br>
            An Independently Owned Franchise<br>

        @if ($request->address2)
            {{ $request->address1 }} • {{ $request->address2 }}<br>{{ $request->city }},  {{ $request->state }} {{ $request->zip }}
        @else
            {{ $request->address1 }}<br>{{ $request->city }},  {{ $request->state }} {{ $request->zip }}
        @endif

        </div>

    </div>       
    @endif

{{-- ///////////////////////// Corp Envelope ////////////////////////// --}}    
    @if ($request->id == 6 || $request->id == 15) 
        @if ($request->id == 6)
            <div class="env_background">
        @elseif ($request->id == 15)
            <div class="env60_background">
        @endif
        
        <div class="env_address">
            Arthur Rutenberg Homes, Inc.<br>

        @if ($request->address2)
            {{ $request->address1 }} • {{ $request->address2 }}<br>{{ $request->city }},  {{ $request->state }} {{ $request->zip }}
        @else
            {{ $request->address1 }}<br>{{ $request->city }},  {{ $request->state }} {{ $request->zip }}
        @endif

        </div>

    </div>       
    @endif 

{{-- //////////////////////// Our Process Brochures //////////////////////// --}}    
    @if ($request->id == 23 || $request->id == 24 || $request->id == 25 || $request->id == 26)  
        @if ($request->id == 23) 
            <div class="opb23_background">
        @elseif ($request->id == 24)
            <div class="opb24_background">
        @elseif ($request->id == 25)
            <div class="opb25_background">
        @elseif ($request->id == 26)
            <div class="opb26_background">
        @endif

            <div class="opb_line1">
               For more information on building your custom home contact: <br>
                @if (!empty($request->name))
                    {{ $request->name }} | 
                @endif

                @if (!empty($request->phone))
                    {{ $request->phone }} | 
                @endif

                @if (!empty($request->cell))
                    {{ $request->cell }} | 
                @endif

                @if (!empty($request->email))
                    {{ $request->email }}
                @endif
            </div>

            <div class="opb_line2">
                @php
                    $string = $request->prod_name;
                    $pieces = explode(' ', $string);
                    $last_word = array_pop($pieces);
                @endphp
                
                {{ Auth::user()->loc_name }} - An Independently Owned Franchise
    
                @if (!empty($request->license))
                     • {{ $request->license }}
                @endif

                • {!! $last_word !!}Collection

            </div>
        </div>       
    @endif 

    </div> {{-- close row --}}
</div>  {{-- close container --}}

{!! Session::put('qty', $request->qty) !!}
{!! Session::put('name', $request->name) !!}
{!! Session::put('title', $request->title) !!}
{!! Session::put('email', $request->email) !!}
{!! Session::put('community', $request->community) !!}
{!! Session::put('address1', $request->address1) !!}
{!! Session::put('address2', $request->address2) !!}
{!! Session::put('city', $request->city) !!}
{!! Session::put('state', $request->state) !!}
{!! Session::put('zip', $request->zip) !!}
{!! Session::put('phone', $request->phone) !!}
{!! Session::put('fax', $request->fax) !!}
{!! Session::put('cell', $request->cell) !!}
{!! Session::put('license', $request->license) !!}
{!! Session::put('specialInstructions', $request->specialInstructions) !!}
{!! Session::put('prod_name', $request->prod_name) !!}
{!! Session::put('prod_description', $request->prod_description) !!}
{!! Session::put('imagePath', $request->imagePath) !!}



</body>
</html>
