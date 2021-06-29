package stack;
public class StackApp {
   public static void main (String [] args){
        Stack tumpukan=new Stack(10);
        tumpukan.push(1);
        tumpukan.baca();
        System.out.println(" ");
        tumpukan.push(2);
        tumpukan.baca();
        long nilai1=tumpukan.pop();
        System.out.println(" ");
        tumpukan.baca();
        System.out.println(" ");
        tumpukan.push(3);
        tumpukan.baca();
        System.out.println(" ");
        tumpukan.push(4);
        tumpukan.baca();
        long nilai2=tumpukan.pop();
        System.out.println(" ");
        tumpukan.baca();
        long nilai3=tumpukan.peek();
        System.out.println(" ");
        System.out.println("nilai top ="+nilai3);
        System.out.println("nilai yang dihapus ="+nilai3);
        System.out.println("maulana ibnu Fajar");
    } 
}
