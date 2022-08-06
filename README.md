## Laravel Cache Basic

# লারাভেল ক্যাস কিছুটা সেশন এর মত, ক্যাস এর কাজ হল মুলত এপ্লিকেশন এর স্পেসিফিক পারফরম্যান্স বাড়ানো।

# লারাভেল ক্যাসিং এর জন্য বেশ কিছু স্টোরেজ সাপোর্ট করে থাকে ঃ
    ১।ফাইল
    ২।ডাটাবেজ
    ৩।রেডিস
    ৪।ম্যামকেস
    ৬।ডায়নামোডিবি
    ৭।নেটিভ এয়ারে
   নোট ঃ ম্যাক্সিমাম ডেভেলাপারই ডাটাবেজ ক্যাস হিসেবে ব্যবহার করতে নিষেধ করে থাকেন।

# ক্যাসিং কনফিগারেশন ঃ
    লারাভেল এ ক্যাস কনফিগারেশন করা হয়  **config/cache.php** এই ফাইলে। Default Cache Deriver হিসেবে file সিলেক্ট করা থাকে ।

# লারাভেলে ক্যাস মেইন্টেনেন্স এর জন্য কিছু মেথডঃ

**Cache::put(key,data,expireTime)** ক্যাস তৈরি করার জন্য এই মেথড ব্যাবহার করা হয়, এটা ৩টি প্যারামিটার নেয়,
**key** কী/বা নাম, আমরা যে নামে ক্যাস হিসেবে ডাটা রাখতে চাচ্ছি ।
**data** হল যেই ডাটা/মেসেজ আমরা রাখতে চাছি ।
**expireTime** হল কতক্ষন এইডাটা এপ্ললিকেশন/ঊসারের কাছে এভিলএবল থাকবে।
    -- একক সেকেন্ড এবং অপশনাল প্যারামিটার ।

``` ##Example :
    $posts = [
        'title'=>'First Post',
        'description'=>'Hello, Bangladesh'
    ]
    Cache::put('posts',$posts,1000);
    Cache::put('greetingCache','Hello Bangladesh',1000);
```
*note* যদি একই নামে ক্যাস থাকে তাহলে আগের ভ্যালু রিপ্লেস করে দেয় put মেথড।

**Cache::get(cacheKey)** তৈরি ক্যাস থেকে ডাটা তুলে আনার জন্য এই মেথড ব্যাবহার করা হয় ।

``` ##Example :
    Cache::get('posts'); > স্পেসিফিক ক্যাস ভালু তুলে আনতে ব্যাবহার করা হয়, কী এক্সিট না থাকলে নাল রিটার্ন করবে।
    Cache::get('posts','Bangladesh'); > যদি কী এক্সিট না করে তাহলে ডিফ্লট ভ্যালু হিসিবে -Bangladesh- রিটার্ন করবে।
    Cache::get('posts',function(){
        return "Bangladesh";
    }); > যদি কী এক্সিট না করে তাহলে ডিফ্লট ভ্যালু হিসিবে কলব্যাক ফাংশন দিয়েও রিটার্ন করা যায়।
```

**Cache::add(key,data,expireTime)** ক্যাস তৈরি করার জন্য এই মেথড ব্যাবহার করা হয়, এটাও put মেথড এর মত এটা শুধু ঃ
*যদি কী এক্সিস্ট থাকে তাহলে কোন ভ্যালু এড হবে না, আর কী এক্সিস্ট না থাকলে ক্যাসে ভ্যালু এড হবে।
*যদি ডাটা এড করতে পারে তাহলে true অন্যথায় false রিটার্ন করবে।

``` ##Example :
    $posts = [
        'title'=>'New Post',
        'description'=>'Hello, Romania'
    ]
    Cache::add('posts',$posts,1000);
```

**Cache::forever('posts','ক্যাসে নতুন ভ্যালু এড করা হল')** ক্যাস তৈরি করার জন্য এই মেথড ব্যাবহার করা হয়, এটা মুলত পার্মানেন্টলি ক্যাশ এড করে থাকে
এটার ক্যাশ মেনুয়ালি ডিলিট করতে হয় forget() ব্যাবহার করে ।
*যদি কী এক্সিস্ট থাকে তাহলে ভ্যালু রিপ্লেসড হবে, আর কী এক্সিস্ট না থাকলে ক্যাসে ভ্যালু এড হবে।

``` ##Example :
    $posts = [
        'title'=>'New Post',
        'description'=>'Hello, Romania'
    ]
    Cache::forever('posts',$posts);
```

**Cache::remember(key,expireTime,closure)** যদি কী এক্সিস্ট থাকে তাহলে কোন ভ্যালু এড হবে না, আর কী এক্সিস্ট না থাকলে ক্যাসে ভ্যালু এড হবে,
 closure এর মাধ্যমে,এটা ৩টি প্যারামিটার নেয়, ক্যাস কী, এক্সপায়ার ডিউরেশন এবং ক্লুজার ফাংশন।

``` ##Example :
    Cache::remember('posts', 20, function(){
        return 'শুভ রাত্রি, এবার আরামে ঘুমাই';
    });
```

**Cache::rememberForever(key,closure)** যদি কী এক্সিস্ট থাকে তাহলে কোন ভ্যালু এড হবে না, আর কী এক্সিস্ট না থাকলে ক্যাসে ভ্যালু এড হবে,
 closure এর মাধ্যমে,এটা ২টি প্যারামিটার নেয়, ক্যাস কী এবং ক্লুজার ফাংশন।

``` ##Example :
    Cache::rememberForever('posts', function(){
        return 'শুভ রাত্রি, এবার আরামে ঘুমাই';
    });
```

**Cache::pull(key)** ডাটা তুলে আনা এবং সেই সাথে ডিলিট করার জন্য এই মেথড ব্যবহার করা হয়।

``` ##Example :
    $cacheData = Cache::pull('posts');
    return $cacheData;
```

**Cache::has(cacheKey)** এই মেথড দিয়ে চেক করা হয়, ক্যাস এক্সিস্ট আছে কিনা এবং সেটার উপর বেস করে
আমরা অনেক সময় আমাদের কন্ডিশয়ান এপ্লাই করে কাজ করতে পারি, এটা একটি প্যারামিটার নেয় যেটা ক্যাস কী।

``` ##Example :
    Cache::has('posts');
    if(Cache::has('posts')){
        //code to be execute
    }
```

**Cache::forget(cacheKey)** পুর্বের তৈরি single কোন ক্যাস ডিলিট করার জন্য এই মেথড ব্যাবহার করা হয়, এটা একটি প্যারামিটার নেয় যেটা ক্যাস কী।

``` ##Example :
    Cache::forget('posts');
```

**Cache::flush()** পুর্বের তৈরি সকল ক্যাস ডিলিট করার জন্য এই মেথড ব্যাবহার করা হয়, এটা কোন প্যারামিটার নেয় না।

``` ##Example :
    Cache::flush();
```
