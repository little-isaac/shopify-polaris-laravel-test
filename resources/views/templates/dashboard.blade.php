@extends('layout.store')
@section('main_content_id','root')
@section('js')
<script>
    widnow.api_key = '{{ env("SHOPIFY_KEY") }}';
    window.shop_name = '{{ Auth::User()->shop_name }}'
</script>
@endsection