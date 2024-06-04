<?php

if (! function_exists('getTagClass')) {
    function getTagClass($tagName): string
    {
        $tag_config = [
            'AllTags' => 'bg-gray-200 text-gray-800 hover:bg-gray-400',
            'Fashion' => 'bg-green-200 text-green-800 hover:bg-green-400',
            'Technology' => 'bg-blue-200 text-blue-800 hover:bg-blue-400',
            'Travel' => 'bg-red-200 text-red-800 hover:bg-red-400',
            'Food' => 'bg-yellow-200 text-yellow-800 hover:bg-yellow-400',
            'Lifestyle' => 'bg-purple-200 text-purple-800 hover:bg-purple-400',
            'Fitness' => 'bg-indigo-200 text-indigo-800 hover:bg-indigo-400',
            'DIY' => 'bg-pink-200 text-pink-800 hover:bg-pink-400',
            'Finance' => 'bg-gray-200 text-gray-800 hover:bg-gray-400',
            'Politics' => 'bg-green-300 text-green-800 hover:bg-green-500',
            'Parenting' => 'bg-blue-300 text-blue-800 hover:bg-blue-500',
            'Business' => 'bg-red-300 text-red-800 hover:bg-red-500',
            'Personal' => 'bg-yellow-300 text-yellow-800 hover:bg-yellow-500',
            'Movie' => 'bg-purple-300 text-purple-800 hover:bg-purple-500',
            'Music' => 'bg-indigo-300 text-indigo-800 hover:bg-indigo-500',
            'Health' => 'bg-pink-300 text-pink-800 hover:bg-pink-500',
            'NoTags' => 'bg-gray-500 text-gray-800 hover:bg-gray-700',
        ];

        return $tag_config[$tagName] ?? $tag_config['NoTags'];
    }
}
