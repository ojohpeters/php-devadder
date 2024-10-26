<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../src/output.css" rel="stylesheet">
    <title>Class 2</title>
</head>
<body>
<div class="max-w-2xl mx-auto">    
    <nav class="border-gray-200">
    <div class="container mx-auto flex flex-wrap items-center justify-between">
        <a href="class2.php" class="flex">
         <img src="../src/img/sacslogo.png" alt="sacs logo" class="h-10 mr-3" width="51" height="70" viewBox="0 0 51 70" fill="none">
            <span class="self-center text-lg font-semibold whitespace-nowrap">SACS Backend Class</span>
        </a>
        <button data-collapse-toggle="mobile-menu" type="button" class="md:hidden ml-3 text-gray-400 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-300 rounded-lg inline-flex items-center justify-center" aria-controls="mobile-menu-2" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
        <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        </button>
        <div class="hidden md:block w-full md:w-auto" id="mobile-menu">
        <ul class="flex-col md:flex-row flex md:space-x-8 mt-4 md:mt-0 md:text-sm md:font-medium">
            <li>
            <a href="class2.php" class="bg-blue-700 md:bg-transparent text-white block pl-3 pr-4 py-2 md:text-blue-700 md:p-0 rounded focus:outline-none" aria-current="page">Home</a>
            </li>  
            <a href="form.php" class="bg-blue-700 md:bg-transparent text-white block pl-3 pr-4 py-2 md:text-blue-700 md:p-0 rounded focus:outline-none" aria-current="page">Add Developer</a>
            </li>  
        </ul>
        </div>
    </div>
    </nav>
</div>
    <div class="flex flex-col">
        <div class="overflow-x-auto shadow-md sm:rounded-lg">
            <div class="inline-block min-w-full align-middle">
                <div class="overflow-hidden">
                    <table class="min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-700">
                        <thead class="bg-gray-100 dark:bg-gray-700">
                            <tr>
                                <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">Developer Name</th>
                                <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">Phone Number</th>
                                <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">Email</th>
                                <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">Remove Developer</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                            <?php 
                                        $apiUrl = 'https://sacsapi.pythonanywhere.com/test/';
                                        $ch = curl_init($apiUrl);
                                        
                                        // Set cURL options
                                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Return the response as a string
                                        curl_setopt($ch, CURLOPT_HTTPGET, true); // Set method to GET
                                        
                                        // Execute the request
                                        $response = curl_exec($ch);
                                        
                                        // Check for errors
                                        if (curl_errno($ch)) {
                                            echo 'Error:' . curl_error($ch);
                                        } else {
                                            // Decode the JSON response into an associative array
                                            $data = json_decode($response, true);
                                            
                                            // // Print the data (for debugging)
                                            // print_r($data);
                                        }                                        
                                        curl_close($ch);   
                                        foreach($data as $d){                                                   
                                
                                ?> 
                            <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <?php                               
                                echo htmlspecialchars($d['name']);
                                ?>                                                      
                            </td>
                                <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white"><?php 
                                    echo htmlspecialchars($d["phone"]);                                                   
                                ?></td>
                                <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white"><?php echo htmlspecialchars($d["email"]); 
                                ?></td>
                                <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <form action="deletedev.php" method="POST">
                                        <input type="hidden" name="email" value='<?php echo htmlspecialchars($d["email"])?>'>
                                        <button type="submit" class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Delete <?php echo htmlspecialchars($d["name"])?></button>
                                    </form>
                                </td>
                            </tr>
                            <?php  
                                        }
                       ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>   
            </div>
        </div>
        </div>
    </div>
</div>
</div>
 <br>
 <?php
 // Assignment
 //create an array to store a range of values from 1 to 1000 in it.
 //create a function that would loop out the odd numbers from the array and another function that would loop out the even numbers in the array
?>
</body>
</html>