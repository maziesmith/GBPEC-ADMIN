<?php
/**
 * Controller to all Public Request such as contact, about etc
 *
 * @author Meraj Ahmad Siddiqui
 */
use Shared\Controller as Controller;
use Framework\Registry as Registry;
use Framework\RequestMethods as RequestMethods;

class Library extends Controller{
    /**
     *
     * @before _secure
     */
    public function index()
    {
        $this->changeLayout();
        $this->seo(array("title" => "Admin Panel","keywords" => "admin","description" => "admin", "view" => $this->getLayoutView()));
        $view = $this->getActionView();
        $this->authorize();
        $student = Student::count();
        if(RequestMethods::post("action")=="student_search"){
            $view->set("search", true);
            if(RequestMethods::post("search_method")=="enrollment"){
                $enrollment = RequestMethods::post("enrollment_number");
                $student = Student::first(array("enrollment_no = ?" => $enrollment), array("enrollment_no", "name", "email", "phone"));
                
            }
        }
         if(RequestMethods::post("action")=="book_search"){
            $view->set("search", true);
            if(RequestMethods::post("search_method")=="accession"){
                $accession = RequestMethods::post("accession_number");
                
            }
        }
        else{
            $view->set("search", false);
        }
    $view->set("student", $student);
    $this->getLayoutView()->set("seo", Framework\Registry::get("seo")); 
    }

    /**
     *
     * @before _secure
     */
    public function profile()
    {
       $this->changeLayout();
        $this->seo(array("title" => "Admin Panel","keywords" => "admin","description" => "admin", "view" => $this->getLayoutView()));
        $view = $this->getActionView();
        $this->authorize();

        $user_details = EmployeeDetail::first(array("employee_id = ?" => $this->user->id));
        $admin = Administrator::first(array("employee_id = ?" => $this->user->id));
        $view->set("user_details", $user_details);
        $view->set("admin", $admin);
        $this->getLayoutView()->set("seo", Framework\Registry::get("seo"));
    }

    /**
     *
     * @before _secure
     */
    public function books()
    {
        
        $this->changeLayout();
        $this->seo(array("title" => "Admin Panel","keywords" => "admin","description" => "admin", "view" => $this->getLayoutView()));
        $view = $this->getActionView();
        // $this->getLayoutView()->set("seo", Framework\Registry::get("seo"));
        $this->authorize();
        // searching books
        $books = BookStore::all();
        $view->set("books", $books);
        $this->getLayoutView()->set("seo", Framework\Registry::get("seo"));


    }

    public function newBook()
    {
        
        $this->changeLayout();
        $this->seo(array("title" => "Admin Panel","keywords" => "admin","description" => "admin", "view" => $this->getLayoutView()));
        $view = $this->getActionView();
        // $this->getLayoutView()->set("seo", Framework\Registry::get("seo"));
        $this->authorize();

        //adding new book
        if(RequestMethods::post("action")=="newbook"){
            $title = RequestMethods::post("title");
            $publication = RequestMethods::post("publication");
            $edition = RequestMethods::post("edition");
            $category = RequestMethods::post("category");
            $stock = RequestMethods::post("stock");
            $cost = RequestMethods::post("cost");

            $book = new BookStore(array("title"=>$title, "publication"=>$publication, "edition" =>$edition, "category"=>$category, "cost" =>$cost, "stock"=>$stock, "sub_category"=>""));
            //if($book->save()){
               // $view->set("success", "Book Successfully saved");
           // }
        }
        // searching books

        $this->getLayoutView()->set("seo", Framework\Registry::get("seo"));


    }

   protected function changeLayout() {
        $this->defaultLayout = "layouts/library";
        $this->setLayout();
        }
    protected function authorize(){
        $admin = Administrator::first(array("employee_id = ?" => $this->user->id));
        if ($admin->department != "library")
        {
            $alert = "Tried to access un authorized department";
            $user = Employee::first(array("id = ?" => $this->user->id));
            $user->warning = $alert;
            $user->save();
           self::redirect("/admin/" . $admin->department);
        }
        else{
            return true;
        }
    }

}
