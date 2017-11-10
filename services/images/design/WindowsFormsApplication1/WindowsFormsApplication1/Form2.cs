using System;
using System.IO;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Windows.Forms;

namespace WindowsFormsApplication1
{
    public partial class Form2 : Form
    {
        public Form2()
        {
            InitializeComponent();
        }

        private void button1_Click(object sender, EventArgs e)
        {

        }

        private void Form2_Load(object sender, EventArgs e)
        {

        }

         void pictureBox3MouseHover(object sender, EventArgs e)
        {
            //If mouse hovers above the box, show pic2
            string path = "PHP.png";  
            pictureBox3.Image = Image.FromFile(path);
        }
         
        void pictureBox3MouseLeave(object sender, EventArgs e)
        {
            //This is to make sure that when the mouse leaves
            //the picture changes back
            string path = "PHP.png";  
            pictureBox3.Image = Image.FromFile(path);
        }

        private void pictureBox8_Click(object sender, EventArgs e)
        {
            MessageBox.Show("Logout");
            this.Hide();
            Form1 form = new Form1();
            form.ShowDialog();
        }

        private void pictureBox4_Click(object sender, EventArgs e)
        {
            MessageBox.Show("TUTORIALS");
            this.Hide();
            Form3 form = new Form3();
            form.ShowDialog();
        }

        private void pictureBox11_Click(object sender, EventArgs e)
        {
            MessageBox.Show("C++ QUIZ");
            this.Hide();
            Form4 form = new Form4();
            form.ShowDialog();
        }

        private void pictureBox12_Click(object sender, EventArgs e)
        {
            MessageBox.Show("JAVA QUIZ");
            this.Hide();
            Form5 form = new Form5();
            form.ShowDialog();
        }

        private void pictureBox10_Click(object sender, EventArgs e)
        {
            MessageBox.Show("PHP QUIZ");
            this.Hide();
            Form6 form = new Form6();
            form.ShowDialog();
        }

        private void pictureBox13_Click(object sender, EventArgs e)
        {
            MessageBox.Show("C# QUIZ");
            this.Hide();
            Form7 form = new Form7();
            form.ShowDialog();
        }


    }
}
