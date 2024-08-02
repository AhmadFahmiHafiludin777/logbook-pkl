<?php 

namespace App\Models;
use Illuminate\Support\Arr;
class School{
    public static function all(){
        return [
            [
                'id' => '1',
                'slug' => 'nama-sekolah-1',
                'nama' => 'sekolah1',
                'no_telp' => '00000000',
                'alamat' => '    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sequi enim explicabo obcaecati ullam id error in ipsa minima, aut similique cumque, excepturi vero dolore libero ipsum maxime nisi modi aspernatur?'
            ],
            [
                'id' => '2',
                'slug' => 'nama-sekolah-2',
                'nama' => 'sekolah2',
                'no_telp' => '111111',
                'alamat' => '  Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iusto velit harum consequuntur iste at, molestias totam. Illum ipsa vel aliquid veritatis placeat delectus atque consequatur exercitationem sequi pariatur, inventore magni, optio cupiditate mollitia temporibus hic unde minus aperiam error maxime cumque ullam animi ut at? Repudiandae dolor sapiente impedit quidem! Voluptate culpa, reiciendis optio tempore, eum architecto tenetur officia ipsum, magni quaerat sunt quos? Iure necessitatibus beatae consectetur, deserunt enim sed aliquam eius ad excepturi sequi earum architecto placeat modi facilis incidunt blanditiis aliquid vel voluptatibus, voluptatem sapiente maiores est fugiat laborum culpa? Non quis labore, ducimus consequuntur nulla cumque cum fugiat fuga autem omnis aperiam alias, atque impedit debitis nesciunt ea ut quidem harum! Incidunt fugiat in distinctio! Eaque tenetur iure, officiis, voluptatem maxime facilis sed consequatur eveniet excepturi quas dolore corporis, dicta totam aliquid temporibus perferendis soluta unde et quae modi odit vitae at quos. Sunt velit harum error minus quo. Odio, rerum? Facere, aperiam commodi nihil deleniti reprehenderit quasi mollitia officia sint quae consectetur voluptatibus recusandae eum, omnis molestiae dicta molestias ducimus nisi maiores id excepturi, sequi dolorum sunt similique. Nostrum officia nobis obcaecati quis consequuntur, nisi aut odit, itaque ratione nesciunt quidem, libero fugit corporis eius?'
            ],
            [
                'id' => '3',
                'slug' => 'nama-sekolah-3',
                'nama' => 'sekolah3',
                'no_telp' => '22222222',
                'alamat' => '          Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero nemo blanditiis nam quae sapiente, aperiam dolores, fugiat, harum molestiae temporibus sint laborum nulla velit? Esse, harum reprehenderit doloribus sapiente nostrum voluptatibus dolor excepturi corrupti quasi pariatur et porro, at dignissimos optio maxime itaque sed, quaerat in nesciunt dolorum tenetur. Modi illo corporis accusantium dicta quidem, quis facere veritatis cupiditate ipsam omnis! Distinctio vitae, iste earum aperiam officia fugit. Sint doloribus corporis esse quam commodi. Sequi, atque. Cum sit voluptates, odit similique perspiciatis eos doloribus aut consectetur fuga veritatis quae aperiam iure minus unde laborum! Officiis vitae repellat blanditiis voluptatum, culpa doloribus ullam sint perferendis debitis dicta minus aut corporis, laudantium accusantium recusandae. Ea aliquam expedita eaque voluptas similique. Dolores nobis facere culpa deleniti dolore blanditiis pariatur quibusdam repudiandae, laboriosam labore illo cum eius dolorem voluptatum quia in earum incidunt dignissimos dolorum quod omnis suscipit? Quo rerum culpa quam nam ad saepe quasi earum adipisci nihil non nemo eaque ut, dolores laudantium odit eum ab voluptatibus doloribus dolorum dolor hic quibusdam. Ducimus repellat, dignissimos accusamus facere asperiores voluptatem dolorem laboriosam impedit eveniet eius temporibus minus? Sint maxime culpa earum unde dicta ipsum eius quasi? Voluptatibus non asperiores consectetur eos dolorum corporis.
        '  ]
            ];
    }

    public static function find($slug): array{
        // return Arr::first(static::all(), function($school) use($slug){
        //     return $school['slug'] == $slug;
    
        //     });

        $school = Arr::first(static::all(), fn($school) => $school['slug'] == $slug);
    
        if(! $school){
            abort(404);
        }

        return $school;
    }
}