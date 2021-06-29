package tree;
public class TreeApp {
     Tree tree = new Tree();
        
        TreeNode node;
       
        public static void main(String[] args) {
        var binding = new Tree();
        
        TreeNode node;
        node = new TreeNode(50);
        binding.insert(node);
        
        node = new TreeNode(30);
        binding.insert(node);
        
        node = new TreeNode(20);
        binding.insert(node);
        
        node = new TreeNode(40);
        binding.insert(node);
        
        node = new TreeNode(70);
        binding.insert(node);
        
      
        System.out.println("\nTraversal dengan Inorder : " );
        binding.inOrder();
        System.out.println("Traversal dengan Preorder : ");
        binding.preOrder();
        System.out.println("\nTraversal dengan Postorder : " );
        binding.postOrder();
        System.out.println();
        System.out.println("Maulana Ibnu Fajar");
        
       
    }
}
