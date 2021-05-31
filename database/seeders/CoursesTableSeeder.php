<?php

namespace Database\Seeders;

use App\Models\Courses;
use Illuminate\Database\Seeder;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Courses::create([
            'cname' => 'Python Programming',
            'cdetails' => 'Python is a general-purpose programming language that’s powerful yet easy to read, making it a great first language to learn. Whether you have never programmed before, already know basic syntax, or want to learn about the advanced features of Python, this course is for you!',
            'cprice' => 1455.5,
            'image_path' => 'python.jpeg'
        ]);

        Courses::create([
            'cname' => 'Android App development Course',
            
            'cdetails' => 'The course focuses on using the Java programming language to develop Android applications.
            The program starts with basic concepts and then trains programmers in best practices. Learn Android App Development building real apps including Uber, Whatsapp and Instagram!',
            'cprice' => 1499.99,
            'image_path' => 'appDev.jpg'
        ]);

        Courses::create([
            'cname' => 'Online MBA',
            
            'cdetails' => 'Take a leap towards the next stage of your career with the MBA program that has been thoughtfully designed for working professionals.
            We offer MBA online classes and courses in education covering a broad range of topics. Start learning today!',
            'cprice' => 949.99,
            
            
            'image_path' => 'mba.jpg'
        ]);

        Courses::create([
            'cname' => 'Machine Learning',
                        'cdetails' => 'nterested in the field of Machine Learning? Then this course is for you!
                        This course has been designed by two professional Data Scientists so that we can share our knowledge and help you learn complex theory, algorithms, and coding libraries in a simple way.',
            'cprice' => 1999.99,
                        
            'image_path' => 'machineLearning.jpg'
        ]);

        
    }
}
