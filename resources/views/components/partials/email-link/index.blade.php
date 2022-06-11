<script @isset($nonce) nonce="{{ $nonce }}" @endisset>
    var part1 = "{!! $name !!}";
    var part2 = Math.pow(2,6);
    var part3 = String.fromCharCode(part2);
    var part4 = "{!! $domain !!}";
    var part5 = part1 + String.fromCharCode(part2) + part4;
    document.write(
        "<a class='{{ $class }}' href="
        + "ma" + "il" + "to" + ":" + part5 + ">" +
        @isset($icon) "<i class='{{ $icon }}'></i>" + @endisset
        part1 + part3 + part4 +
        "</a>"
    );
</script>
