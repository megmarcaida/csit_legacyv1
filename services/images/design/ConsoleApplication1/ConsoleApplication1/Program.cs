using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace Private_access_specifier
{
    class access
    {
        public string lname;
        public string fname;
        public string mname;
        public string address;
        public string age;
        public string contact;
        public void print()
        {
            Console.WriteLine("\nLast Name:" + lname);
            Console.WriteLine("First Name:" + fname);
            Console.WriteLine("Middle Name:" + mname);
            Console.WriteLine("Address:" + address);
            Console.WriteLine("Age:" + age);
            Console.WriteLine("contact:" + contact);
        }
    }

    class Program
    {
        static void Main(string[] args)
        {
            access ac=new access();
            Console.WriteLine("Enter your Last name\t");
            ac.lname=Console.ReadLine();

            Console.WriteLine("Enter Your First name\t");
            ac.fname=Console.ReadLine();

            Console.WriteLine("Enter Your Middle name\t");
            ac.mname = Console.ReadLine();

            Console.WriteLine("Enter Your Address\t");
            ac.address = Console.ReadLine();

            Console.WriteLine("Enter Your Age\t");
            ac.age = Console.ReadLine();

            Console.WriteLine("Enter Your Contact\t");
            ac.contact = Console.ReadLine();


            ac.print();
            Console.ReadLine();

        }
    }
}
